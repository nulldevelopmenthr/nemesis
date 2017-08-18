<?php

declare(strict_types=1);

namespace NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\ExposeGettersMethod;
use NullDev\Skeleton\CodeGenerator\MethodGenerator;
use NullDev\Skeleton\CodeGenerator\PhpParser\ParameterValueGenerator;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Property;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\TypeDeclaration;
use PhpParser\Builder\Param;
use PhpParser\BuilderFactory;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\Variable;

/**
 * @see ExposeGettersGeneratorSpec
 */
class ExposeGettersGenerator implements MethodGenerator
{
    private $builderFactory;

    public function __construct(BuilderFactory $builderFactory)
    {
        $this->builderFactory = $builderFactory;
    }

    public function supports($classMethod): bool
    {
        return $classMethod instanceof ExposeGettersMethod;
    }

    public function generate(ExposeGettersMethod $method)
    {
        $node = $this->builderFactory
            ->method($method->getMethodName())
            ->makePublic();

        foreach ($method->getMethodParameters() as $param) {
            $node->addParam($this->createMethodParam($param));
        }

        foreach ($method->getProperties() as $property) {
            if (true === $this->isParameterEligibleForMethodParameter($property)) {
                $node->addStmt(
                    new MethodCall(
                        new MethodCall(
                            new Variable('this'),
                            'get'.ucfirst($property->getName())
                        ),
                        'shouldReturn',
                        [
                            new Arg(new Variable($property->getName())),
                        ]
                    )
                );
            } else {
                $node->addStmt(
                    new MethodCall(
                        new MethodCall(
                            new Variable('this'),
                            'get'.ucfirst($property->getName())
                        ),
                        'shouldReturn',
                        [ParameterValueGenerator::generate($property)]
                    )
                );
            }
        }

        return $node;
    }

    private function isParameterEligibleForMethodParameter(Property $property): bool
    {
        if (false === $property->hasType()) {
            return false;
        }

        if ($property->getType() instanceof TypeDeclaration) {
            return false;
        }

        return true;
    }

    private function createMethodParam(Parameter $param): Param
    {
        $result = $this->builderFactory->param($param->getName());

        if (true === $param->hasType()) {
            $result->setTypeHint($param->getTypeShortName());
        }

        return $result;
    }
}
