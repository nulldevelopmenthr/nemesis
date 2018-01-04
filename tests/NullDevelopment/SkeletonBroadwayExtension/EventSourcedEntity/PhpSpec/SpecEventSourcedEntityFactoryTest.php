<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpSpec;

use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpSpec\SpecEventSourcedEntity;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpSpec\SpecEventSourcedEntityFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\SourceCode\EventSourcedEntity;
use Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\EventSourcedEntityFixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpSpec\SpecEventSourcedEntityFactory
 * @group  integration
 */
class SpecEventSourcedEntityFactoryTest extends SfTestCase
{
    /** @var SpecEventSourcedEntityFactory */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SpecEventSourcedEntityFactory::class);
    }

    /** @dataProvider provideEventSourcedEntitys */
    public function testCreateFromEventSourcedEntity(EventSourcedEntity $command, SpecEventSourcedEntity $expected)
    {
        self::assertEquals($expected, $this->sut->createFromEventSourcedEntity($command));
    }

    public function provideEventSourcedEntitys(): array
    {
        return [
            [EventSourcedEntityFixtures::actorEntity(), EventSourcedEntityFixtures::specActorEntity()],
        ];
    }
}
