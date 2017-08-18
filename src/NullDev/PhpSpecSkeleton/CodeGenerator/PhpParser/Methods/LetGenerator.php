<?php

declare(strict_types=1);

namespace NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\LetMethod;
use NullDev\Skeleton\CodeGenerator\MethodGenerator;
use NullDev\Skeleton\CodeGenerator\PhpParser\TestValueGenerator;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\TypeDeclaration;
use PhpParser\BuilderFactory;
use PhpParser\Node\Expr\Assign;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\Variable;

class LetGenerator implements MethodGenerator
{
    private $builderFactory;

    public function __construct(BuilderFactory $builderFactory)
    {
        $this->builderFactory = $builderFactory;
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

        if (false === $parameter->hasType() || $parameter->getType() instanceof TypeDeclaration) {
            return new Assign($variable, TestValueGenerator::generate($parameter));
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
