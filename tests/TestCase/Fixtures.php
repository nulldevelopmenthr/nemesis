<?php

declare(strict_types=1);

namespace Tests\TestCase;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;

class Fixtures
{
    public static function userEntity(): ClassName
    {
        return ClassName::create('MyVendor\\UserEntity');
    }

    public static function firstName(): ClassName
    {
        return ClassName::create('MyVendor\\User\\UserFirstName');
    }

    public static function lastName(): ClassName
    {
        return ClassName::create('MyVendor\\User\\UserLastName');
    }

    public static function firstNameProperty(): Property
    {
        return new Property(
            'firstName',
            self::firstName(),
            false,
            false,
            false,
            new Visibility('private')
        );
    }

    public static function lastNameProperty(): Property
    {
        return new Property(
            'lastName',
            self::lastName(),
            false,
            false,
            false,
            new Visibility('private')
        );
    }

    public static function integerIdProperty(): Property
    {
        return new Property(
            'id',
            ClassName::create('int'),
            false,
            false,
            false,
            new Visibility('private')
        );
    }

    public static function nameProperty(): Property
    {
        return new Property(
            'name',
            ClassName::create('string'),
            false,
            false,
            false,
            new Visibility('private')
        );
    }
}
