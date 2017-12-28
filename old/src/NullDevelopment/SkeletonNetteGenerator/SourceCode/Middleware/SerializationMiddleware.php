<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class SerializationMiddleware implements PartialCodeGeneratorMiddleware
{
    public function execute($definition, callable $next)
    {
        /** @var PhpNamespace $namespace */
        $namespace = $next($definition);

        /** @var ClassType $class */
        foreach ($namespace->getClasses() as $class) {
            $cnt = count($definition->getProperties());
            if (1 === $cnt) {
                // @var Property $property
                foreach ($definition->getProperties() as $property) {
                    if (true === in_array($property->getInstanceFullName(), ['int', 'string', 'float', 'bool', 'array'])) {
                        $class->addMethod('serialize')
                            ->setReturnType($property->getInstanceName()->getFullName())
                            ->addBody('return $this->'.$property->getName().';');

                        $deserializeMethod = $class->addMethod('deserialize')
                            ->setStatic(true)
                            ->setReturnType('self')
                            ->addBody('return new self($'.$property->getName().');');

                        $deserializeMethod->addParameter($property->getName())
                            ->setTypeHint($property->getInstanceName()->getFullName());
                    } else {
                        //@TODO: add return type
                        $class->addMethod('serialize')
                            //->setReturnType($property->getInstanceName()->getFullName())
                            ->addBody('return $this->'.$property->getName().'->serialize();');
                        $deserializeMethod = $class->addMethod('deserialize')
                            ->setStatic(true)
                            ->setReturnType('self')
                            ->addBody(
                                sprintf('return new self(%s::deserialize($%s));', $property->getInstanceName()->getName(), $property->getName())
                            );
                        //@TODO: add type hint
                        $deserializeMethod->addParameter($property->getName());
                        //->setTypeHint($property->getInstanceName()->getFullName());
                    }
                }
            } else {
                $serializeList   = [];
                $deserializeList = [];

                $serializeMethod = $class->addMethod('serialize')
                    ->setReturnType('array');

                $deserializeMethod = $class->addMethod('deserialize')
                    ->setStatic(true)
                    ->setReturnType('self');

                // @var Property $property
                foreach ($definition->getProperties() as $property) {
                    $contractName = $property->getInstanceName()->getName();
                    if (true === in_array($property->getInstanceFullName(), ['int', 'string', 'float', 'bool', 'array'])) {
                        $serializeList[]  = sprintf("'%s' => \$this->%s", $property->getName(), $property->getName());
                        $deserializeList[]= sprintf("\$data['%s']", $property->getName());
                    } elseif ('DateTime' === $property->getInstanceFullName()) {
                        $serializeList[]  = sprintf("'%s' => \$this->%s->format('c')", $property->getName(), $property->getName());
                        $deserializeList[]= sprintf("new DateTime(\$data['%s'])", $property->getName());
                    } else {
                        if (true === $property->isNullable()) {
                            $serializeMethod->addBody(sprintf('if(null === $this->%s){', $property->getName()));
                            $serializeMethod->addBody(sprintf('    $%s = null;', $property->getName()));
                            $serializeMethod->addBody('}else{');
                            $serializeMethod->addBody(sprintf('    $%s = $this->%s->serialize();', $property->getName(), $property->getName()));
                            $serializeMethod->addBody('}');
                            $serializeMethod->addBody('');

                            $deserializeMethod->addBody(sprintf('if(null === $data[\'%s\']){', $property->getName()));
                            $deserializeMethod->addBody(sprintf('    $%s = null;', $property->getName()));
                            $deserializeMethod->addBody('}else{');
                            $deserializeMethod->addBody(
                                sprintf("    $%s = %s::deserialize(\$data['%s']);", $property->getName(), $contractName, $property->getName())
                            );
                            $deserializeMethod->addBody('}');
                            $deserializeMethod->addBody('');

                            $serializeList[]   = sprintf("'%s' => \$%s", $property->getName(), $property->getName());
                            $deserializeList[] = sprintf('$%s', $property->getName());
                        } else {
                            $serializeList[]   = sprintf("'%s' => \$this->%s->serialize()", $property->getName(), $property->getName());
                            $deserializeList[] = sprintf("%s::deserialize(\$data['%s'])", $contractName, $property->getName());
                        }
                    }
                }

                $indent = PHP_EOL.'    ';

                $serializeMethod->addBody('return ['.$indent.implode(', '.$indent, $serializeList).PHP_EOL.'];');
                $deserializeMethod->addBody('return new self('.$indent.implode(', '.$indent, $deserializeList).PHP_EOL.');');

                $deserializeMethod->addParameter('data')
                    ->setTypeHint('array');
            }
        }

        return $namespace;
    }
}
