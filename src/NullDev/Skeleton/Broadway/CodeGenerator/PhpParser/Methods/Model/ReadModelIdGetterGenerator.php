<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Broadway\CodeGenerator\PhpParser\Methods\Model;

use NullDev\Skeleton\Broadway\Definition\PHP\Methods\Model\ReadModelIdGetterMethod;
use NullDev\Skeleton\CodeGenerator\CodeGenerator;
use PhpParser\BuilderFactory;
use PhpParser\Node;
use PhpParser\Node\Expr\Cast\String_;

class ReadModelIdGetterGenerator implements CodeGenerator
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
        return $classMethod instanceof ReadModelIdGetterMethod;
    }

    public function generate(ReadModelIdGetterMethod $method)
    {
        $getterMethod = $this->builderFactory
            ->method($method->getMethodName())
            ->makePublic();

        if ($method->hasMethodReturnType()) {
            $getterMethod->setReturnType($method->getMethodReturnType());
        }

        $return = new Node\Stmt\Return_(
            new String_(
                new Node\Expr\Variable('this->'.$method->getPropertyName())
            )
        );
        $getterMethod->addStmt($return);

        return $getterMethod;
    }
}
