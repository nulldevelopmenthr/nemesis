<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestDeserializeMethod;

/**
 * @see TestDeserializeMethodGeneratorSpec
 * @see TestDeserializeMethodGeneratorTest
 */
class TestDeserializeMethodGenerator extends BaseTestMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof TestDeserializeMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        if (1 === count($method->getProperties()) && false === $method->getProperties()[0]->isObject()) {
            // @var Property $property
            foreach ($method->getProperties() as $property) {
                $deserializeBody = sprintf(
                    'self::assertEquals($this->sut, $this->sut->deserialize($this->%s));', $property->getName()
                );

                $code
                    ->addBody($deserializeBody);
            }
        } else {
            $code
                ->addBody('$serialized = json_encode($this->sut->serialize());')
                ->addBody(
                    'self::assertEquals($this->sut, '.$method->getClassName()->getName().'::deserialize(json_decode($serialized,true)));'
                );
        }
    }

    public function getMethodGeneratorPriority(): int
    {
        return 96;
    }
}
