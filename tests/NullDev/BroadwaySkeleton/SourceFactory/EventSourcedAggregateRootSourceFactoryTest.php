<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\SourceFactory;

use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourcedAggregateRootSourceFactory;
use NullDev\Skeleton\Source\ClassSourceFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\SourceFactory\EventSourcedAggregateRootSourceFactory
 * @group  nemesis
 */
class EventSourcedAggregateRootSourceFactoryTest extends PHPUnit_Framework_TestCase
{
    /** @var EventSourcedAggregateRootSourceFactory */
    private $factory;

    public function setUp(): void
    {
        $this->factory = new EventSourcedAggregateRootSourceFactory(new ClassSourceFactory(), new DefinitionFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
