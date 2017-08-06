<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\BroadwaySkeleton\Definition\PHP\Methods\DeserializeMethod;
use NullDev\Skeleton\CodeGenerator\MethodGenerator;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\TypeDeclaration;
use PhpParser\BuilderFactory;
use PhpParser\Node;
use PhpParser\Node\Name;

class DeserializeGenerator implements MethodGenerator
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
        return $classMethod instanceof DeserializeMethod;
    }

    public function generate(DeserializeMethod $method)
    {
        $deserializeMethod = $this->builderFactory
            ->method($method->getMethodName())
            ->makePublic()
            ->makeStatic()
            ->setReturnType($method->getMethodReturnType());

        foreach ($method->getMethodParameters() as $methodParameter) {
            $deserializeMethod->addParam($this->createMethodParam($methodParameter));
        }

        $zz = [];

        foreach ($method->getProperties() as $property) {
            if ($property->hasType() && (!$property->getType() instanceof TypeDeclaration)) {
                $var = new Node\Expr\New_(
                    new Name($property->getTypeShortName()),
                    [new Node\Arg(new Node\Expr\Variable('data[\''.$property->getName().'\']'))]
                );
            } else {
                $var = new Node\Expr\Variable('data[\''.$property->getName().'\']');
            }

            $zz[] = $var;
        }
        $return = new Node\Stmt\Return_(
            new Node\Expr\New_(
                new Name('self'),
                $zz
            )
        );
        $deserializeMethod->addStmt($return);

        return $deserializeMethod;
    }

    private function createMethodParam(Parameter $param)
    {
        $result = $this->builderFactory->param($param->getName());

        if ($param->hasType()) {
            $result->setTypeHint($param->getTypeShortName());
        }

        return $result;
    }
}
