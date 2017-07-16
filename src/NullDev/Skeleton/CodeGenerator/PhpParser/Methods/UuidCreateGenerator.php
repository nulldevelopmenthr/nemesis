<?php

declare(strict_types=1);

namespace NullDev\Skeleton\CodeGenerator\PhpParser\Methods;

use NullDev\Skeleton\CodeGenerator\CodeGenerator;
use NullDev\Skeleton\Definition\PHP\Methods\UuidCreateMethod;
use PhpParser\BuilderFactory;
use PhpParser\Node;
use PhpParser\Node\Name;

class UuidCreateGenerator implements CodeGenerator
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
        return $classMethod instanceof UuidCreateMethod;
    }

    public function generate(UuidCreateMethod $method)
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
                [new Node\Expr\Variable('id')]
            )
        );
        $zzMethod->addStmt($factory);
        $zzMethod->addStmt($return);

        return $zzMethod;
    }
}
