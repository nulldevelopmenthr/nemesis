<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\CommandHandler;

use NullDev\BroadwaySkeleton\Definition\PHP\Methods\CommandHandler\LoadAggregateRootModelMethod;
use NullDev\Skeleton\CodeGenerator\MethodGenerator;
use NullDev\Skeleton\Definition\PHP\Parameter;
use PhpParser\BuilderFactory;
use PhpParser\Node;

/**
 * @see LoadAggregateRootModelGeneratorSpec
 * @see LoadAggregateRootModelGeneratorTest
 */
class LoadAggregateRootModelGenerator implements MethodGenerator
{
    private $builderFactory;

    public function __construct(BuilderFactory $builderFactory)
    {
        $this->builderFactory = $builderFactory;
    }

    public function supports($classMethod): bool
    {
        return $classMethod instanceof LoadAggregateRootModelMethod;
    }

    public function generate(LoadAggregateRootModelMethod $method)
    {
        $loadMethod = $this->builderFactory
            ->method($method->getMethodName())
            ->makePrivate()
            ->setReturnType($method->getMethodReturnType());

        $return = new Node\Stmt\Return_(
            new Node\Expr\MethodCall(
                new Node\Expr\Variable('this->repository'),
                'load',
                [
                    new Node\Arg(new Node\Expr\Variable('id')),
                ]
            )
        );
        $loadMethod->addStmt($return);

        $loadMethod->addParam($this->createMethodParam($method->getMethodParameters()[0]));

        return $loadMethod;
    }

    private function createMethodParam(Parameter $param)
    {
        $result = $this->builderFactory->param($param->getName());

        if (true === $param->hasType()) {
            $result->setTypeHint($param->getTypeShortName());
        }

        return $result;
    }
}
