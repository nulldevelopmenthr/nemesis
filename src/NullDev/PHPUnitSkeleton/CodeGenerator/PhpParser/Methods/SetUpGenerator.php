<?php

declare(strict_types=1);

namespace NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\SetUpMethod;
use NullDev\Skeleton\CodeGenerator\MethodGenerator;
use NullDev\Skeleton\CodeGenerator\PhpParser\ParameterValueGenerator;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\TypeDeclaration;
use PhpParser\BuilderFactory;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\Assign;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Name;

/**
 * @see SetUpGeneratorSpec
 * @see SetUpGeneratorTest
 */
class SetUpGenerator implements MethodGenerator
{
    private $builderFactory;

    public function __construct(BuilderFactory $builderFactory)
    {
        $this->builderFactory = $builderFactory;
    }

    public function supports($classMethod): bool
    {
        return $classMethod instanceof SetUpMethod;
    }

    public function generate(SetUpMethod $method)
    {
        $node = $this->builderFactory
            ->method($method->getMethodName())
            ->makePublic();

        foreach ($method->getSubjectUnderTestConstuctorParameters() as $methodParameter) {
            $node->addStmt(
                $this->createParamffffff($methodParameter)
            );
        }

        $node->addStmt(
            new Assign(
                new Variable(
                    'this->'.lcfirst($method->getSubjectUnderTestName())
                ),
                new New_(
                    new Name($method->getSubjectUnderTestName()),
                    $this->createConstructorParams($method->getSubjectUnderTestConstuctorParameters())
                )
            )
        );

        return $node;
    }

    private function createConstructorParams(array $paramz): array
    {
        $constructorParams = [];

        foreach ($paramz as $parameter) {
            $constructorParams[] = new Variable('this->'.lcfirst($parameter->getName()));
        }

        return $constructorParams;
    }

    private function createParamffffff(Parameter $parameter)
    {
        $variable = new Variable('this->'.lcfirst($parameter->getName()));

        if (false === $parameter->hasType() || $parameter->getType() instanceof TypeDeclaration) {
            return new Assign($variable, ParameterValueGenerator::generate($parameter));
        }

        return new Assign(
            $variable,
            new StaticCall(
                new Name('Mockery'),
                'mock',
                [
                    new Arg(
                        new ClassConstFetch(new Name($parameter->getTypeShortName()), 'class')
                    ),
                ]
            )
        );
    }
}
