<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpUnit;

use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpUnit\TestEventSourcingRepository;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpUnit\TestEventSourcingRepositoryFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCode\EventSourcingRepository;
use Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\EventSourcingRepositoryFixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpUnit\TestEventSourcingRepositoryFactory
 * @group  integration
 */
class TestEventSourcingRepositoryFactoryTest extends SfTestCase
{
    /** @var TestEventSourcingRepositoryFactory */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(TestEventSourcingRepositoryFactory::class);
    }

    /** @dataProvider provideEventSourcingRepositorys */
    public function testCreateFromEventSourcingRepository(
        EventSourcingRepository $command, TestEventSourcingRepository $expected
    ) {
        self::assertEquals($expected, $this->sut->createFromEventSourcingRepository($command));
    }

    public function provideEventSourcingRepositorys(): array
    {
        return [
            [EventSourcingRepositoryFixtures::actorEntity(), EventSourcingRepositoryFixtures::testActorEntity()],
        ];
    }
}
