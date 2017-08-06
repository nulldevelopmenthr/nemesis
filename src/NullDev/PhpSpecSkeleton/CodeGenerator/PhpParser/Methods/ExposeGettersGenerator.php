<?php

declare(strict_types=1);

namespace NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\ExposeGettersMethod;
use NullDev\Skeleton\CodeGenerator\MethodGenerator;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\ArrayType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\BoolType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\FloatType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\IntType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\StringType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\TypeDeclaration;
use PhpParser\Builder\Param;
use PhpParser\BuilderFactory;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\DNumber;
use PhpParser\Node\Scalar\LNumber;
use PhpParser\Node\Scalar\String_;

/**
 * @see ExposeGettersGeneratorSpec
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ExposeGettersGenerator implements MethodGenerator
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
        return $classMethod instanceof ExposeGettersMethod;
    }

    public function generate(ExposeGettersMethod $method)
    {
        $node = $this->builderFactory
            ->method($method->getMethodName())
            ->makePublic();

        foreach ($method->getMethodParameters() as $param) {
            if (true === $this->isParameterEligibleForMethodParameter($param)) {
                $node->addParam($this->createMethodParam($param));
            }
        }

        foreach ($method->getMethodParameters() as $param) {
            if (true === $this->isParameterEligibleForMethodParameter($param)) {
                $node->addStmt(
                    new MethodCall(
                        new MethodCall(
                            new Variable('this'),
                            'get'.ucfirst($param->getName())
                        ),
                        'shouldReturn',
                        [
                        new Arg(new Variable($param->getName())),
                        ]
                    )
                );
            } else {
                $node->addStmt(
                    new MethodCall(
                        new MethodCall(
                            new Variable('this'),
                            'get'.ucfirst($param->getName())
                        ),
                        'shouldReturn',
                        [$this->createShouldReturn($param)]
                    )
                );
            }
        }

        return $node;
    }

    private function createShouldReturn(Parameter $parameter)
    {
        if (false === $parameter->hasType()) {
            return new String_($parameter->getName());
        }

        if ($parameter->getType() instanceof StringType) {
            return new String_($parameter->getName());
        } elseif ($parameter->getType() instanceof IntType) {
            return new LNumber(1);
        } elseif ($parameter->getType() instanceof ArrayType) {
            return new Array_([], ['kind' => Array_::KIND_SHORT]);
        } elseif ($parameter->getType() instanceof FloatType) {
            return new DNumber(2.0);
        } elseif ($parameter->getType() instanceof BoolType) {
            return new ConstFetch(new Name('true'));
        }

        throw new \Exception('ERR 242342123123: Unhandled argument received.');
    }

    private function isParameterEligibleForMethodParameter(Parameter $parameter): bool
    {
        if (false === $parameter->hasType()) {
            return false;
        }

        if ($parameter->getType() instanceof TypeDeclaration) {
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
