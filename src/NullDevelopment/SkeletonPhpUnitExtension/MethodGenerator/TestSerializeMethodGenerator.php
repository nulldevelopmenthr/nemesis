<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestSerializeMethod;

/**
 * @see TestSerializeMethodGeneratorSpec
 * @see TestSerializeMethodGeneratorTest
 */
class TestSerializeMethodGenerator extends BaseTestMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof TestSerializeMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        if (1 === count($method->getProperties())) {
            $property = $method->getProperties()[0];

            if (false === $property->isObject()) {
                // @var Property $property
                $code->addBody(
                    sprintf('self::assertEquals($this->%s, $this->sut->serialize());', $property->getName())
                );
            } else {
                $code->addBody(
                    sprintf('self::assertEquals($this->%s->serialize(), $this->sut->serialize());', $property->getName())
                );
            }
        } else {
            $list = [];

            foreach ($method->getProperties() as $property) {
                $list[] = sprintf('\'%s\'=> %s', $property->getName(), $this->exampleMaker->value($property));
            }
            $code->addBody('$expected = [')
                ->addBody("\t".implode(','.PHP_EOL."\t", $list))
                ->addBody('];')
                ->addBody('')
                ->addBody('self::assertSame($expected, $this->sut->serialize());');
        }
    }
}
