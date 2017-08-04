<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Uuid\CodeGenerator\PhpParser\Methods;

use NullDev\Skeleton\CodeGenerator\MethodGenerator;
use NullDev\Skeleton\Uuid\Definition\PHP\Methods\UuidCreateMethod;
use PhpParser\Builder\Method;
use PhpParser\BuilderFactory;
use PhpParser\Node;
use PhpParser\Node\Name;

class UuidCreateGenerator implements MethodGenerator
{
    private $builderFactory;

    public function __construct(BuilderFactory $builderFactory)
    {
        $this->builderFactory = $builderFactory;
    }

    public function supports($classMethod): bool
    {
        return $classMethod instanceof UuidCreateMethod;
    }

    public function generate(UuidCreateMethod $method): Method
    {
        $zzMethod = $this->builderFactory
            ->method($method->getMethodName())
            ->makePublic()
            ->makeStatic()
            ->setReturnType($method->getMethodReturnType());

        $factory =
            new Node\Expr\Assign(
                new Node\Expr\Variable('id'),
                new Node\Expr\MethodCall(
                    new Node\Expr\StaticCall(
                        new Name('Uuid'),
                        'uuid4'
                    ),
                    'toString'
                )
            );

        $return = new Node\Stmt\Return_(
            new Node\Expr\New_(
                new Name('self'),
                [
                    new Node\Arg(new Node\Expr\Variable('id')),
                ]
            )
        );
        $zzMethod->addStmt($factory);
        $zzMethod->addStmt($return);

        return $zzMethod;
    }
}
