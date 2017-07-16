<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model;

use NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model\CreateMethod;
use NullDev\Skeleton\CodeGenerator\MethodGenerator;
use NullDev\Skeleton\Definition\PHP\Parameter;
use PhpParser\BuilderFactory;

class CreateGenerator implements MethodGenerator
{
    private $builderFactory;

    public function __construct(BuilderFactory $builderFactory)
    {
        $this->builderFactory = $builderFactory;
    }

    public static function default(): self
    {
        return new self(new BuilderFactory());
    }

    public function supports($classMethod): bool
    {
        return $classMethod instanceof CreateMethod;
    }

    public function generate(CreateMethod $method)
    {
        $createMethod = $this->builderFactory
            ->method($method->getMethodName())
            ->makePublic()
            ->makeStatic()
            ->setReturnType($method->getMethodReturnType());

        foreach ($method->getMethodParameters() as $param) {
            $createMethod->addParam($this->createMethodParam($param));
        }

        return $createMethod;
    }

    private function createMethodParam(Parameter $param)
    {
        $result = $this->builderFactory->param($param->getName());

        if ($param->hasClass()) {
            $result->setTypeHint($param->getClassType()->getName());
        }

        return $result;
    }
}
