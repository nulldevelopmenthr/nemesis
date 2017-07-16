<?php

declare(strict_types=1);

namespace NullDev\Skeleton\PhpSpec\CodeGenerator\PhpParser\Methods;

use NullDev\Skeleton\CodeGenerator\CodeGenerator;
use NullDev\Skeleton\PhpSpec\Definition\PHP\Methods\InitializableMethod;
use PhpParser\BuilderFactory;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Name;

class InitializableGenerator implements CodeGenerator
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
        return $classMethod instanceof InitializableMethod;
    }

    public function generate(InitializableMethod $method)
    {
        $node = $this->builderFactory
            ->method($method->getMethodName())
            ->makePublic();

        foreach ($method->getShouldHaveTypes() as $classType) {
            $node->addStmt(
                new MethodCall(
                    new Variable('this'),
                    'shouldHaveType',
                    [
                        new ClassConstFetch(
                            new Name($classType->getName()),
                            'class'
                        ),
                    ]
                )
            );
        }

        return $node;
    }
}
