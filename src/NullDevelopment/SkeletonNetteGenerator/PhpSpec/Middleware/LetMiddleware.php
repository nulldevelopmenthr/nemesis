<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\PhpSpec\Middleware;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataType\MethodParameter;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class LetMiddleware implements PartialCodeGeneratorMiddleware
{
    /** @var ExampleMaker */
    private $exampleMaker;

    public function __construct(ExampleMaker $exampleMaker)
    {
        $this->exampleMaker = $exampleMaker;
    }

    public function execute($definition, callable $next)
    {
        /** @var PhpNamespace $namespace */
        $namespace = $next($definition);

        if (false === $definition->hasConstructorMethod()) {
            return $namespace;
        }

        /** @var ClassType $class */
        foreach ($namespace->getClasses() as $class) {
            $letMethod = $class->addMethod('let')
                ->setVisibility(Visibility::PUBLIC);

            $beConstructedWithArguments = [];
            /** @var MethodParameter $parameter */
            foreach ($definition->getConstructorParameters() as $parameter) {
                if (false === in_array($parameter->getInstanceFullName(), ['int', 'string', 'float', 'bool', 'array'])) {
                    $namespace->addUse($parameter->getInstanceFullName());

                    $letMethod->addParameter($parameter->getName())
                        ->setTypeHint($parameter->getInstanceFullName());

                    $beConstructedWithArguments[] = '$'.$parameter->getName();
                } else {
                    $beConstructedWithArguments[] = '$'.$parameter->getName().' = '.$this->exampleMaker->instance($parameter);
                }
            }

            $letMethod->addBody(
                '$this->beConstructedWith('.implode(', ', $beConstructedWithArguments).');'
            );

            $initializableMethod = $class->addMethod('it_is_initializable');

            $initializableMethod->addBody('$this->shouldHaveType('.$definition->getClassName().'::class);');

            if (true === $definition->hasParent()) {
                $initializableMethod->addBody(
                    '$this->shouldHaveType('.$definition->getParentClassName().'::class);'
                );
            }

            if (true === $definition->hasInterfaces()) {
                foreach ($definition->getInterfaces() as $interface) {
                    $initializableMethod->addBody('$this->shouldImplement('.$interface->getName().'::class);');
                }
            }
        }

        return $namespace;
    }
}
