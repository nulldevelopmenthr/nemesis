<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Broadway\SourceFactory;

use NullDev\Skeleton\Broadway\SourceFactory\EventSourceFactory;
use NullDev\Skeleton\Definition\PHP\DefinitionFactory;
use NullDev\Skeleton\Source\ClassSourceFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Broadway\SourceFactory\EventSourceFactory
 * @group nemesis
 */
class EventSourceFactoryTest extends PHPUnit_Framework_TestCase
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
