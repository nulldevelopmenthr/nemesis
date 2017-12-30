<?php

declare(strict_types=1);

namespace NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestGetterMethod;
use NullDev\Skeleton\CodeGenerator\MethodGenerator;
use PhpParser\BuilderFactory;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Name;

/**
 * @see TestGetterGeneratorSpec
 * @see TestGetterGeneratorTest
 */
class TestGetterGenerator implements MethodGenerator
{
    private $builderFactory;

    public function __construct(BuilderFactory $builderFactory)
    {
        $this->builderFactory = $builderFactory;
    }

    public function supports($classMethod): bool
    {
        return $classMethod instanceof TestGetterMethod;
    }

    public function generate(TestGetterMethod $method)
    {
        $node = $this->builderFactory
            ->method($method->getMethodName())
            ->makePublic();

        $node->addStmt(
            new StaticCall(
                new Name('self'),
                'assertEquals',
                [
                    new Arg(
                        new Variable(
                            'this->'.lcfirst($method->getParameterName())
                        )
                    ),
                    new Arg(
                        new MethodCall(
                            new Variable('this->sut'),
                            $method->getGetterMethodName()
                        )
                    ),
                ]
            )
        );

        return $node;
    }
}
