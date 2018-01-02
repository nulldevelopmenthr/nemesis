<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpSpec;

use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpSpec\SpecEventSourcingRepository;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpSpec\SpecEventSourcingRepositoryFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCode\EventSourcingRepository;
use Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\EventSourcingRepositoryFixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpSpec\SpecEventSourcingRepositoryFactory
 * @group  integration
 */
class SpecEventSourcingRepositoryFactoryTest extends SfTestCase
{
    /** @var SpecEventSourcingRepositoryFactory */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SpecEventSourcingRepositoryFactory::class);
    }

    /**
     * @dataProvider provideEventSourcingRepositorys
     */
    public function testCreateFromEventSourcingRepository(EventSourcingRepository $command, SpecEventSourcingRepository $expected)
    {
        self::assertEquals($expected, $this->sut->createFromEventSourcingRepository($command));
    }

    public function provideEventSourcingRepositorys(): array
    {
        return [
            [EventSourcingRepositoryFixtures::actorEntity(), EventSourcingRepositoryFixtures::specActorEntity()],
        ];
    }
}
