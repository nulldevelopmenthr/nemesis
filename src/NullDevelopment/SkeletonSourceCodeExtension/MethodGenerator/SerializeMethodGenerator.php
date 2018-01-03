<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\SkeletonSourceCodeExtension\Method\SerializeMethod;

/**
 * @see SerializeMethodGeneratorSpec
 * @see SerializeMethodGeneratorTest
 */
class SerializeMethodGenerator extends BaseMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof SerializeMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        if (1 === count($method->getProperties())) {
            $property = $method->getProperties()[0];

            if (true === $property->isObject()) {
                $code->addBody(sprintf('return $this->%s->serialize();', $property->getName()));
            } else {
                $code->addBody(sprintf('return $this->%s;', $property->getName()));
            }
        } else {
            $serializeList = [];

            /** @var Property $property */
            foreach ($method->getProperties() as $property) {
                if (true === in_array($property->getInstanceFullName(), ['int', 'string', 'float', 'bool', 'array'])) {
                    $serializeList[] = sprintf("'%s' => \$this->%s", $property->getName(), $property->getName());
                } elseif ('DateTime' === $property->getInstanceFullName()) {
                    $serializeList[] = sprintf("'%s' => \$this->%s->format('c')", $property->getName(), $property->getName());
                } else {
                    if (true === $property->isNullable()) {
                        $code->addBody(sprintf('if(null === $this->%s){', $property->getName()));
                        $code->addBody(sprintf('    $%s = null;', $property->getName()));
                        $code->addBody('}else{');
                        $code->addBody(sprintf('    $%s = $this->%s->serialize();', $property->getName(), $property->getName()));
                        $code->addBody('}');
                        $code->addBody('');

                        $serializeList[] = sprintf("'%s' => \$%s", $property->getName(), $property->getName());
                    } else {
                        $serializeList[] = sprintf("'%s' => \$this->%s->serialize()", $property->getName(), $property->getName());
                    }
                }
            }

            $indent = PHP_EOL.'    ';

            $code->addBody('return ['.$indent.implode(', '.$indent, $serializeList).PHP_EOL.'];');
        }
    }
}
