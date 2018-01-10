<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model;

use NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model\AggregateRootIdGetterMethod;
use NullDev\Skeleton\CodeGenerator\MethodGenerator;
use PhpParser\BuilderFactory;
use PhpParser\Node;

class AggregateRootIdGetterGenerator implements MethodGenerator
{
    private $builderFactory;

    public function __construct(BuilderFactory $builderFactory)
    {
        $this->builderFactory = $builderFactory;
    }

    public function supports($classMethod): bool
    {
        return $classMethod instanceof AggregateRootIdGetterMethod;
    }

    public function generate(AggregateRootIdGetterMethod $method)
    {
        $getterMethod = $this->builderFactory
            ->method($method->getMethodName())
            ->makePublic();

        if ($method->hasMethodReturnType()) {
            $getterMethod->setReturnType($method->getMethodReturnType());
        }

        $return = new Node\Stmt\Return_(new Node\Expr\Variable('this->'.$method->getPropertyName()));
        $getterMethod->addStmt($return);

        return $getterMethod;
    }
}
