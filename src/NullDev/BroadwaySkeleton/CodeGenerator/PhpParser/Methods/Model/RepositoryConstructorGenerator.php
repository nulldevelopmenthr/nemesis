<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model;

use Broadway\EventHandling\EventBus;
use Broadway\EventStore\EventStore;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model\RepositoryConstructorMethod;
use NullDev\Skeleton\CodeGenerator\MethodGenerator;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\InterfaceType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\ArrayType;
use PhpParser\BuilderFactory;
use PhpParser\Node;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Name;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class RepositoryConstructorGenerator implements MethodGenerator
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
        return $classMethod instanceof RepositoryConstructorMethod;
    }

    public function generate(RepositoryConstructorMethod $method)
    {
        $constructor = $this->builderFactory
            ->method('__construct')
            ->makePublic();

        $constructor->addParam(
            $this->createMethodParam(
                new Parameter('eventStore', InterfaceType::createFromFullyQualified(EventStore::class))
            )
        );

        $constructor->addParam(
            $this->createMethodParam(
                new Parameter('eventBus', InterfaceType::createFromFullyQualified(EventBus::class))
            )
        );
        $constructor->addParam(
            $this->createMethodParamWithDefaultValue(
                new Parameter('eventStreamDecorators', new ArrayType()),
                []
            )
        );

        $constructor->addStmt(
            new Node\Expr\StaticCall(
                new Name('parent'),
                '__construct',
                [
                    new Node\Arg(new Node\Expr\Variable('eventStore')),
                    new Node\Arg(new Node\Expr\Variable('eventBus')),
                    new Node\Arg(new ClassConstFetch(new Name($method->getModelClassType()->getName()), 'class')),
                    new Node\Arg(new Node\Expr\New_(new Name('PublicConstructorAggregateFactory'))),
                    new Node\Arg(new Node\Expr\Variable('eventStreamDecorators')),
                ]
            )
        );

        return $constructor;
    }

    private function createMethodParam(Parameter $param)
    {
        $result = $this->builderFactory->param($param->getName());

        if (true === $param->hasType()) {
            $result->setTypeHint($param->getTypeShortName());
        }

        return $result;
    }

    private function createMethodParamWithDefaultValue(Parameter $param, $defaultValue)
    {
        $result = $this->builderFactory->param($param->getName());

        if (true === $param->hasType()) {
            $result->setTypeHint($param->getTypeShortName());
        }

        $result->setDefault($defaultValue);

        return $result;
    }
}
