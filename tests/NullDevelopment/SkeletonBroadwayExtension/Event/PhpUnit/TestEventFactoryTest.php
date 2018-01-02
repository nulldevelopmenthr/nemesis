<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnit;

use NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnit\TestEvent;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnit\TestEventFactory;
use NullDevelopment\SkeletonBroadwayExtension\Event\SourceCode\Event;
use Tests\NullDevelopment\SkeletonBroadwayExtension\Event\EventFixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnit\TestEventFactory
 * @group  integration
 */
class TestEventFactoryTest extends SfTestCase
{
    /** @var TestEventFactory */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(TestEventFactory::class);
    }

    /**
     * @dataProvider provideEvents
     */
    public function testCreateFromEvent(Event $command, TestEvent $expected)
    {
        self::assertEquals($expected, $this->sut->createFromEvent($command));
    }

    public function provideEvents(): array
    {
        return [
            [EventFixtures::showCreatedEvent(), EventFixtures::testShowCreatedEvent()],
        ];
    }
}
