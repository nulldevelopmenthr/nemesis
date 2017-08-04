<?php

declare(strict_types=1);

namespace NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\LetMethod;
use NullDev\Skeleton\CodeGenerator\MethodGenerator;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\ArrayType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\BoolType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\FloatType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\IntType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\StringType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\TypeDeclaration;
use PhpParser\BuilderFactory;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\Assign;
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\DNumber;
use PhpParser\Node\Scalar\LNumber;
use PhpParser\Node\Scalar\String_;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class LetGenerator implements MethodGenerator
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
        return $classMethod instanceof LetMethod;
    }

    public function generate(LetMethod $method)
    {
        $node = $this->builderFactory
            ->method($method->getMethodName())
            ->makePublic();

        $beParams = [];

        foreach ($method->getMethodParameters() as $param) {
            if ($this->isParameterEligibleForLetParameter($param)) {
                $node->addParam($this->createMethodParam($param));
                $beParams[] = new Variable($param->getName());
            } else {
                $beParams[] = $this->createBeConstructedWithArgument($param);
            }
        }

        $node->addStmt(new MethodCall(new Variable('this'), 'beConstructedWith', $beParams));

        return $node;
    }

    private function createBeConstructedWithArgument(Parameter $parameter)
    {
        $variable = new Variable($parameter->getName());

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

        throw new \Exception('ERR 90131234: Unhandled argument received.');
    }

    private function isParameterEligibleForLetParameter(Parameter $parameter)
    {
        if (false === $parameter->hasType()) {
            return false;
        }

        if ($parameter->getType() instanceof TypeDeclaration) {
            return false;
        }

        return true;
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
