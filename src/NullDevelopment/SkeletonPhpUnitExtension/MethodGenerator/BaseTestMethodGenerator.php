<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\Skeleton\Core\MethodGenerator;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;

abstract class BaseTestMethodGenerator implements MethodGenerator
{
    /** @var ExampleMaker */
    protected $exampleMaker;

    public function __construct(ExampleMaker $exampleMaker)
    {
        $this->exampleMaker = $exampleMaker;
    }

    abstract public function supports(Method $method): bool;

    public function generateAsString(ClassType $netteCode, Method $method): string
    {
        $code = $this->generate($netteCode, $method);

        return $code->__toString();
    }

    public function generate(ClassType $netteCode, Method $method)
    {
        $code = $netteCode->addMethod($method->getName());

        $code->setVisibility((string) $method->getVisibility());

        if ('' !== $method->getReturnType()) {
            $code->setReturnType($method->getReturnType());
            $code->setReturnNullable($method->isNullableReturnType());
        }

        $this->generateMethodBody($method, $code);

        return $code;
    }

    abstract protected function generateMethodBody($method, NetteMethod $code);
}
