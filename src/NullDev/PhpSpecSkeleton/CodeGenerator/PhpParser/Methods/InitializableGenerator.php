<?php

declare(strict_types=1);

namespace NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\InitializableMethod;
use NullDev\Skeleton\CodeGenerator\MethodGenerator;
use PhpParser\BuilderFactory;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Name;

class InitializableGenerator implements MethodGenerator
{
    private $builderFactory;

    public function __construct(BuilderFactory $builderFactory)
    {
        $this->builderFactory = $builderFactory;
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
                        new Arg(
                            new ClassConstFetch(
                                new Name($classType->getName()),
                                'class'
                            )
                        ),
                    ]
                )
            );
        }

        return $node;
    }
}
