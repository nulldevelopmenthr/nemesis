<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\CodeGenerator;

use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Property;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;

class LolProvider
{
    public function provideAll(): ImprovedClassSource
    {
        $classType = ClassType::createFromFullyQualified('BlaBla\Lol');

        $source = new ImprovedClassSource($classType);

        $parameters = [
            Parameter::create('id', 'int'),
            Parameter::create('name', 'string'),
            Parameter::create('price', 'float'),
            Parameter::create('smart', 'bool'),
            Parameter::create('tags', 'array'),
            Parameter::create('randomValue'),
        ];
        $source->addConstructorMethod(new ConstructorMethod($parameters));
        foreach ($parameters as $parameter) {
            $source->addProperty(Property::createFromParameter($parameter));
        }

        return $source;
    }
}
