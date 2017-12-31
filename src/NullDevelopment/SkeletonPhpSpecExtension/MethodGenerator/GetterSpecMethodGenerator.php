<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\Method\GetterSpecMethod;

/**
 * @see GetterSpecMethodGeneratorSpec
 * @see GetterSpecMethodGeneratorTest
 */
class GetterSpecMethodGenerator implements MethodGenerator
{
    /** @var ExampleMaker */
    private $exampleMaker;

    public function __construct(ExampleMaker $exampleMaker)
    {
        $this->exampleMaker = $exampleMaker;
    }

    public function supports(Method $method): bool
    {
        if ($method instanceof GetterSpecMethod) {
            return true;
        }

        return false;
    }

    public function generateAsString(Method $method): string
    {
        $code = $this->generate($method);

        return $code->__toString();
    }

    public function generate(Method $method): NetteMethod
    {
        $code = new NetteMethod($method->getName());

        $code->setVisibility((string) $method->getVisibility());

        if ('' !== $method->getReturnType()) {
            $code->setReturnType($method->getReturnType());
            $code->setReturnNullable($method->isNullableReturnType());
        }

        foreach ($method->getParameters() as $parameter) {
            if (true === $parameter->isObject()) {
                $code->addParameter($parameter->getName())
                    ->setTypeHint($parameter->getInstanceFullName());
            }
        }

        $this->generateMethodBody($method, $code);

        return $code;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        if (true === $method->getProperty()->isObject()) {
            $value = '$'.$method->getPropertyName();
        } else {
            $value = (string) $this->exampleMaker->value($method->getProperty());
        }

        $code->addBody(
            sprintf('$this->%s()->shouldReturn(%s);', $method->getMethodUnderTest(), $value)
        );
    }
}
