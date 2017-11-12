<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\BroadwaySkeleton\Definition\PHP\Methods\SerializeMethod;
use NullDev\Skeleton\CodeGenerator\MethodGenerator;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\TypeDeclaration;
use PhpParser\BuilderFactory;
use PhpParser\Node;

class SerializeGenerator implements MethodGenerator
{
    private $builderFactory;

    public function __construct(BuilderFactory $builderFactory)
    {
        $this->builderFactory = $builderFactory;
    }

    public function supports($classMethod): bool
    {
        return $classMethod instanceof SerializeMethod;
    }

    public function generate(SerializeMethod $method)
    {
        $serializeMethod = $this->builderFactory
            ->method($method->getMethodName())
            ->makePublic()
            ->setReturnType($method->getMethodReturnType());

        $zz = [];

        foreach ($method->getProperties() as $property) {
            if ($property->hasType() && (!$property->getType() instanceof TypeDeclaration)) {
                if ('DateTime' === $property->getType()->getFullName()) {
                    $var =
                        new Node\Expr\MethodCall(
                            new Node\Expr\Variable('this->'.$property->getName()),
                            'format',
                            [new Node\Arg(new Node\Scalar\String_('c'))]
                        );
                } else {
                    $var =
                        new Node\Expr\Cast\String_(
                            new Node\Expr\Variable('this->'.$property->getName())
                        );
                }
            } else {
                $var = new Node\Expr\Variable('this->'.$property->getName());
            }

            $zz[] = new Node\Expr\ArrayItem(
                $var,
                new Node\Scalar\String_($property->getName())
            );
        }

        $return = new Node\Stmt\Return_(
            new Node\Expr\Array_(
                $zz,
                ['kind' => Node\Expr\Array_::KIND_SHORT]
            )
        );
        $serializeMethod->addStmt($return);

        return $serializeMethod;
    }
}
