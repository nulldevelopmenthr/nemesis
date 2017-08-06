<?php

declare(strict_types=1);

namespace NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\SetUpMethod;
use NullDev\Skeleton\CodeGenerator\MethodGenerator;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\ArrayType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\BoolType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\FloatType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\IntType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\StringType;
use PhpParser\BuilderFactory;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\Assign;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\DNumber;
use PhpParser\Node\Scalar\LNumber;
use PhpParser\Node\Scalar\String_;

/**
 * @see SetUpGeneratorSpec
 * @see SetUpGeneratorTest
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
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

        if (false === $parameter->hasType()) {
            return new Assign($variable, new String_($parameter->getName()));
        }

        if ($parameter->getType() instanceof StringType) {
            return new Assign($variable, new String_($parameter->getName()));
        } elseif ($parameter->getType() instanceof IntType) {
            return new Assign($variable, new LNumber(1));
        } elseif ($parameter->getType() instanceof ArrayType) {
            return new Assign($variable, new Array_([], ['kind' => Array_::KIND_SHORT]));
        } elseif ($parameter->getType() instanceof FloatType) {
            return new Assign($variable, new DNumber(2.0));
        } elseif ($parameter->getType() instanceof BoolType) {
            return new Assign($variable, new ConstFetch(new Name('true')));
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
