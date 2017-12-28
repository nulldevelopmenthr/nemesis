<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\SourceFactory;

use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourceFactory;
use NullDev\Skeleton\Source\ClassSourceFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\SourceFactory\EventSourceFactory
 * @group  nemesis
 */
class EventSourceFactoryTest extends TestCase
{
    /** @var EventSourceFactory */
    private $eventSourceFactory;

    public function setUp(): void
    {
        $this->eventSourceFactory = new EventSourceFactory(new ClassSourceFactory(), new DefinitionFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
