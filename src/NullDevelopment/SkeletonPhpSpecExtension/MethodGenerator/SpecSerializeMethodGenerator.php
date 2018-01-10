<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecSerializeMethod;

/**
 * @see SpecSerializeMethodGeneratorSpec
 * @see SpecSerializeMethodGeneratorTest
 */
class SpecSerializeMethodGenerator extends BaseSpecMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof SpecSerializeMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        if (1 === count($method->getProperties())) {
            $property = $method->getProperties()[0];
            $value    = $this->exampleMaker->value($property);

            if (true === $property->isObject()) {
                $code->addBody(
                    sprintf('$%s->serialize()->shouldBeCalled()->willReturn(%s);', $property->getName(), $value)
                );
            }
        } else {
            $values = [];
            foreach ($method->getProperties() as $property) {
                $values[] = sprintf("'%s' => %s", $property->getName(), $this->exampleMaker->value($property));

                if (true === $property->isObject()) {
                    if ('DateTime' === $property->getInstanceFullName()) {
                        $code->addBody(
                            sprintf(
                                '$%s->format(\'c\')->shouldBeCalled()->willReturn(%s);',
                                $property->getName(),
                                $this->exampleMaker->value($property)
                            )
                        );
                    } else {
                        $code->addBody(
                            sprintf(
                                '$%s->serialize()->shouldBeCalled()->willReturn(%s);',
                                $property->getName(),
                                $this->exampleMaker->value($property)
                            )
                        );
                    }
                }
            }

            $value = '['.implode(', ', $values).']';
        }

        $code->addBody(sprintf('$this->serialize()->shouldReturn(%s);', $value));
    }

    public function getMethodGeneratorPriority(): int
    {
        return 95;
    }
}
