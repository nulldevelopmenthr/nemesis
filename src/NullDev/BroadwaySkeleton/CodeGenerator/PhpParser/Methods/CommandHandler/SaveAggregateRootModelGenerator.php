<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\CommandHandler;

use NullDev\BroadwaySkeleton\Definition\PHP\Methods\CommandHandler\SaveAggregateRootModelMethod;
use NullDev\Skeleton\CodeGenerator\MethodGenerator;
use NullDev\Skeleton\Definition\PHP\Parameter;
use PhpParser\BuilderFactory;
use PhpParser\Node;

/**
 * @see SaveAggregateRootModelGeneratorSpec
 * @see SaveAggregateRootModelGeneratorTest
 */
class SaveAggregateRootModelGenerator implements MethodGenerator
{
    private $builderFactory;

    public function __construct(BuilderFactory $builderFactory)
    {
        $this->builderFactory = $builderFactory;
    }

    public function supports($classMethod): bool
    {
        return $classMethod instanceof SaveAggregateRootModelMethod;
    }

    public function generate(SaveAggregateRootModelMethod $method)
    {
        $saveMethod = $this->builderFactory
            ->method($method->getMethodName())
            ->makePrivate();

        $repoSaveCall =
            new Node\Expr\MethodCall(
                new Node\Expr\Variable('this->repository'),
                'save',
                [
                    new Node\Arg(new Node\Expr\Variable('model')),
                ]
        );
        $saveMethod->addStmt($repoSaveCall);
        $saveMethod->addParam($this->createMethodParam($method->getMethodParameters()[0]));

        return $saveMethod;
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
