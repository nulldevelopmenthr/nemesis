<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ToStringMethod;

/**
 * @see ToStringMethodGeneratorSpec
 * @see ToStringMethodGeneratorTest
 */
class ToStringMethodGenerator extends BaseMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof ToStringMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $property = $method->getProperty();

        if ('bool' === $property->getInstanceFullName()) {
            $code->addBody('if(true === $this->'.$property->getName().'){');
            $code->addBody("    return 'true';");
            $code->addBody('}else{');
            $code->addBody("    return 'false';");
            $code->addBody('}');
        } elseif ('string' === $property->getInstanceFullName()) {
            $code->addBody('return $this->'.$property->getName().';');
        } else {
            $code->addBody('return (string) $this->'.$property->getName().';');
        }
    }
}
