<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Source;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Source\ImprovedClassSource
 * @group  nemesis
 */
class ClassSourceFactoryTest extends PHPUnit_Framework_TestCase
{
    public function testCreate(): void
    {
        $factory = new ClassSourceFactory();

        self::assertInstanceOf(
            ImprovedClassSource::class,
            $factory->create(ClassType::createFromFullyQualified('My\Namespace\User'))
        );
    }
}
