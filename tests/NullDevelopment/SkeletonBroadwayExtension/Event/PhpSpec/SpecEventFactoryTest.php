<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpec;

use NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpec\SpecEvent;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpec\SpecEventFactory;
use NullDevelopment\SkeletonBroadwayExtension\Event\SourceCode\Event;
use Tests\NullDevelopment\SkeletonBroadwayExtension\Event\EventFixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpec\SpecEventFactory
 * @group  integration
 */
class SpecEventFactoryTest extends SfTestCase
{
    /** @var SpecEventFactory */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SpecEventFactory::class);
    }

    /** @dataProvider provideEvents */
    public function testCreateFromEvent(Event $command, SpecEvent $expected)
    {
        self::assertEquals($expected, $this->sut->createFromEvent($command));
    }

    public function provideEvents(): array
    {
        return [
            [EventFixtures::showCreatedEvent(), EventFixtures::specShowCreatedEvent()],
        ];
    }
}
