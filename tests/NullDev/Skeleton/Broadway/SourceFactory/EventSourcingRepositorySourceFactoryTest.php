<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Broadway\SourceFactory;

use NullDev\Skeleton\Broadway\SourceFactory\EventSourcingRepositorySourceFactory;
use NullDev\Skeleton\Definition\PHP\DefinitionFactory;
use NullDev\Skeleton\Source\ClassSourceFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Broadway\SourceFactory\EventSourcingRepositorySourceFactory
 * @group nemesis
 */
class EventSourcingRepositorySourceFactoryTest extends PHPUnit_Framework_TestCase
{
    /** @var EventSourcingRepositorySourceFactory */
    private $factory;

    public function setUp(): void
    {
        $this->factory = new EventSourcingRepositorySourceFactory(new ClassSourceFactory(), new DefinitionFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
