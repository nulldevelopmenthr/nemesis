<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnit;

use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnit\TestEventSourcedEntity;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnit\TestEventSourcedEntityFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\SourceCode\EventSourcedEntity;
use Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\EventSourcedEntityFixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnit\TestEventSourcedEntityFactory
 * @group  integration
 */
class TestEventSourcedEntityFactoryTest extends SfTestCase
{
    /** @var TestEventSourcedEntityFactory */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(TestEventSourcedEntityFactory::class);
    }

    /** @dataProvider provideEventSourcedEntitys */
    public function testCreateFromEventSourcedEntity(EventSourcedEntity $command, TestEventSourcedEntity $expected)
    {
        self::assertEquals($expected, $this->sut->createFromEventSourcedEntity($command));
    }

    public function provideEventSourcedEntitys(): array
    {
        return [
            [EventSourcedEntityFixtures::actorEntity(), EventSourcedEntityFixtures::testActorEntity()],
        ];
    }
}
