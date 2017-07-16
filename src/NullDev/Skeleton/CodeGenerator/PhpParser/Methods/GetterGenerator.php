<?php

declare(strict_types=1);

namespace NullDev\Skeleton\CodeGenerator\PhpParser\Methods;

use NullDev\Skeleton\CodeGenerator\MethodGenerator;
use NullDev\Skeleton\Definition\PHP\Methods\GetterMethod;
use PhpParser\BuilderFactory;
use PhpParser\Node;

class GetterGenerator implements MethodGenerator
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
        return $classMethod instanceof GetterMethod;
    }

    public function generate(GetterMethod $method)
    {
        $getterMethod = $this->builderFactory
            ->method($method->getMethodName())
            ->makePublic();

        if ($method->hasMethodReturnType()) {
            $getterMethod->setReturnType($method->getMethodReturnType());
        }

        $return = new Node\Stmt\Return_(
            new Node\Expr\Variable('this->'.$method->getPropertyName())
        );
        $getterMethod->addStmt($return);

        return $getterMethod;
    }
}
