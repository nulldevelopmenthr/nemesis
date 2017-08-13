<?php

declare(strict_types=1);

namespace NullDev\Skeleton\CodeGenerator\PhpParser;

use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\ArrayType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\BoolType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\FloatType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\IntType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\StringType;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\DNumber;
use PhpParser\Node\Scalar\LNumber;
use PhpParser\Node\Scalar\String_;

/**
 * @see ParameterValueGeneratorSpec
 * @see ParameterValueGeneratorTest
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ParameterValueGenerator
{
    public static function generate(Parameter $parameter)
    {
        if (false === $parameter->hasType() || $parameter->getType() instanceof StringType) {
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

        throw new \Exception('ERR 12313: Unhandled argument received.');
    }
}
