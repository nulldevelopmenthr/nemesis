<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Source;

use NullDev\Skeleton\Source\ClassSourceFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Source\ClassSourceFactory
 * @group nemesis
 */
class ClassSourceFactoryTest extends PHPUnit_Framework_TestCase
{
    /** @var ClassSourceFactory */
    private $classSourceFactory;

    public function setUp(): void
    {
        $this->classSourceFactory = new ClassSourceFactory();
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
