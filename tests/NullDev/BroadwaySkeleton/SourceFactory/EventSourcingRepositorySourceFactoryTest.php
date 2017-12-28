<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\SourceFactory;

use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourcingRepositorySourceFactory;
use NullDev\Skeleton\Source\ClassSourceFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\SourceFactory\EventSourcingRepositorySourceFactory
 * @group  nemesis
 */
class EventSourcingRepositorySourceFactoryTest extends TestCase
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
