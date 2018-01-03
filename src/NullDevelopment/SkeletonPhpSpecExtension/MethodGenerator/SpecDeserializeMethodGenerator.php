<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDeserializeMethod;

/**
 * @see SpecDeserializeMethodGeneratorSpec
 * @see SpecDeserializeMethodGeneratorTest
 */
class SpecDeserializeMethodGenerator extends BaseSpecMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof SpecDeserializeMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        if (1 === count($method->getProperties())) {
            $property = $method->getProperties()[0];
            $value    = $this->exampleMaker->value($property);
        } else {
            $values = [];
            foreach ($method->getProperties() as $property) {
                $values[] = sprintf("'%s' => %s", $property->getName(), $this->exampleMaker->value($property));
            }

            $value = '['.implode(', ', $values).']';
        }

        $code->addBody(sprintf('$input = %s;', $value))
            ->addBody('')
            ->addBody(
                sprintf(
                    '$this->deserialize($input)->shouldReturnAnInstanceOf(%s::class);',
                    $method->getClassName()->getName()
                )
            );
    }

    public function getMethodGeneratorPriority(): int
    {
        return 96;
    }
}
