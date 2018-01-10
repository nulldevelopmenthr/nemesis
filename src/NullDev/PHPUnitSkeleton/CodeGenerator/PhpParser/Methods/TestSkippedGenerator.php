<?php

declare(strict_types=1);

namespace NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestSkippedMethod;
use NullDev\Skeleton\CodeGenerator\MethodGenerator;
use PhpParser\BuilderFactory;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Scalar\String_;

/**
 * @see TestSkippedGeneratorSpec
 * @see TestSkippedGeneratorTest
 */
class TestSkippedGenerator implements MethodGenerator
{
    private $builderFactory;

    public function __construct(BuilderFactory $builderFactory)
    {
        $this->builderFactory = $builderFactory;
    }

    public function supports($classMethod): bool
    {
        return $classMethod instanceof TestSkippedMethod;
    }

    public function generate(TestSkippedMethod $method)
    {
        $node = $this->builderFactory
            ->method($method->getMethodName())
            ->makePublic();

        $node->addStmt(new MethodCall(new Variable('this'), 'markTestSkipped', [new Arg(new String_('Skipping'))]));

        return $node;
    }
}
