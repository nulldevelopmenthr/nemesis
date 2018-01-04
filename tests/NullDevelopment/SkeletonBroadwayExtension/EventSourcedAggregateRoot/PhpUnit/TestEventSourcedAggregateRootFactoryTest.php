<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnit;

use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnit\TestEventSourcedAggregateRoot;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnit\TestEventSourcedAggregateRootFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\SourceCode\EventSourcedAggregateRoot;
use Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\EventSourcedAggregateRootFixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnit\TestEventSourcedAggregateRootFactory
 * @group  integration
 */
class TestEventSourcedAggregateRootFactoryTest extends SfTestCase
{
    /** @var TestEventSourcedAggregateRootFactory */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(TestEventSourcedAggregateRootFactory::class);
    }

    /** @dataProvider provideEventSourcedAggregateRoots */
    public function testCreateFromEventSourcedAggregateRoot(EventSourcedAggregateRoot $command, TestEventSourcedAggregateRoot $expected)
    {
        self::assertEquals($expected, $this->sut->createFromEventSourcedAggregateRoot($command));
    }

    public function provideEventSourcedAggregateRoots(): array
    {
        return [
            [EventSourcedAggregateRootFixtures::actorEntity(), EventSourcedAggregateRootFixtures::testActorEntity()],
        ];
    }
}
