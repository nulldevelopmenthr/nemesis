<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator;

abstract class BaseTestMethodGenerator implements MethodGenerator
{
    /** @var ExampleMaker */
    protected $exampleMaker;

    public function __construct(ExampleMaker $exampleMaker)
    {
        $this->exampleMaker = $exampleMaker;
    }

    abstract public function supports(Method $method): bool;

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
        /*
        foreach ($method->getParameters() as $parameter) {
            if (true === $parameter->isObject()) {
                $code->addParameter($parameter->getName())
                    ->setTypeHint($parameter->getInstanceFullName());
            }
        }
        */
        $this->generateMethodBody($method, $code);

        return $code;
    }

    abstract protected function generateMethodBody($method, NetteMethod $code);
}
