<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecToStringMethod;

/**
 * @see SpecToStringMethodGeneratorSpec
 * @see SpecToStringMethodGeneratorTest
 */
class SpecToStringMethodGenerator extends BaseSpecMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof SpecToStringMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $property = $method->getProperty();
        $value    = $this->exampleMaker->value($property);

        if (true === in_array($property->getInstanceFullName(), ['int', 'float', 'bool'])) {
            $value = "'".$value."'";
        }

        $code->addBody(sprintf('$this->__toString()->shouldReturn(%s);', $value));
    }
}
