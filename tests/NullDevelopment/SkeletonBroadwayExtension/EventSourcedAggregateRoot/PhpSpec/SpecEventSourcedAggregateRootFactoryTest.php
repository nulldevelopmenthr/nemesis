<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpec;

use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpec\SpecEventSourcedAggregateRoot;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpec\SpecEventSourcedAggregateRootFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\SourceCode\EventSourcedAggregateRoot;
use Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\EventSourcedAggregateRootFixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpSpec\SpecEventSourcedAggregateRootFactory
 * @group  integration
 */
class SpecEventSourcedAggregateRootFactoryTest extends SfTestCase
{
    /** @var SpecEventSourcedAggregateRootFactory */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SpecEventSourcedAggregateRootFactory::class);
    }

    /** @dataProvider provideEventSourcedAggregateRoots */
    public function testCreateFromEventSourcedAggregateRoot(
        EventSourcedAggregateRoot $command, SpecEventSourcedAggregateRoot $expected
    ) {
        self::assertEquals($expected, $this->sut->createFromEventSourcedAggregateRoot($command));
    }

    public function provideEventSourcedAggregateRoots(): array
    {
        return [
            [EventSourcedAggregateRootFixtures::actorEntity(), EventSourcedAggregateRootFixtures::specActorEntity()],
        ];
    }
}
