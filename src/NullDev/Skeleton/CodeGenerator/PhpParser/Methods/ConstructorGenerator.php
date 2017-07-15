<?php

declare(strict_types=1);

namespace NullDev\Skeleton\CodeGenerator\PhpParser\Methods;

use NullDev\Skeleton\CodeGenerator\CodeGenerator;
use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use PhpParser\BuilderFactory;
use PhpParser\Node;

/**
 * @see ConstructorGeneratorSpec
 */
class ConstructorGenerator implements CodeGenerator
{
    private $builderFactory;

    public function __construct(BuilderFactory $builderFactory)
    {
        $this->builderFactory = $builderFactory;
    }

    public function supports($classMethod): bool
    {
        return $classMethod instanceof ConstructorMethod;
    }

    public function generate(ConstructorMethod $method)
    {
        $constructor = $this->builderFactory
            ->method('__construct')
            ->makePublic();

        foreach ($method->getMethodParameters() as $param) {
            $constructor->addParam($this->createMethodParam($param));
            $constructor->addStmt($this->createConstructorMethodAssignment($param));
        }

        return $constructor;
    }

    private function createMethodParam(Parameter $param)
    {
        $result = $this->builderFactory->param($param->getName());

        if ($param->hasClass()) {
            $result->setTypeHint($param->getClassType()->getName());
        }

        return $result;
    }

    private function createConstructorMethodAssignment(Parameter $param)
    {
        return new Node\Expr\Assign(
            new Node\Expr\Variable('this->'.$param->getName()),
            new Node\Expr\Variable($param->getName())
        );
    }
}
