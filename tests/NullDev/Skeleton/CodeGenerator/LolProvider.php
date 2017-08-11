<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\CodeGenerator;

use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\ArrayType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\BoolType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\FloatType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\IntType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\StringType;
use NullDev\Skeleton\Source\ImprovedClassSource;

class LolProvider
{
    public function provideAll(): ImprovedClassSource
    {
        $classType = ClassType::createFromFullyQualified('BlaBla\Lol');

        $source = new ImprovedClassSource($classType);

        $parameters = [
            new Parameter('id', new IntType()),
            new Parameter('name', new StringType()),
            new Parameter('price', new FloatType()),
            new Parameter('smart', new BoolType()),
            new Parameter('tags', new ArrayType()),
            new Parameter('randomValue'),
        ];
        $source->addConstructorMethod(new ConstructorMethod($parameters));
        foreach ($parameters as $parameter) {
            $source->addProperty($parameter);
        }

        return $source;
    }
}
