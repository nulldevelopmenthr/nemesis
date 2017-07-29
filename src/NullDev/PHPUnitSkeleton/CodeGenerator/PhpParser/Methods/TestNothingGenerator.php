<?php

declare(strict_types=1);

namespace NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestNothingMethod;
use NullDev\Skeleton\CodeGenerator\MethodGenerator;
use PhpParser\BuilderFactory;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Scalar\String_;

/**
 * @see TestNothingGeneratorSpec
 * @see TestNothingGeneratorTest
 */
class TestNothingGenerator implements MethodGenerator
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
        return $classMethod instanceof TestNothingMethod;
    }

    public function generate(TestNothingMethod $method)
    {
        $node = $this->builderFactory
            ->method($method->getMethodName())
            ->makePublic();

        $node->addStmt(
            new MethodCall(
                new Variable('this'),
                'markTestIncomplete',
                [
                    new Arg(
                        new String_('Auto generated using nemesis')
                    ),
                ]
            )
        );

        return $node;
    }
}
