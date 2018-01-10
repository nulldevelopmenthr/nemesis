<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\Source;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\Source\ImprovedClassSource
 * @group  nemesis
 */
class ClassSourceFactoryTest extends TestCase
{
    public function testCreate(): void
    {
        $factory = new ClassSourceFactory();

        self::assertInstanceOf(
            ImprovedClassSource::class, $factory->create(ClassType::createFromFullyQualified('My\Namespace\User'))
        );
    }
}
