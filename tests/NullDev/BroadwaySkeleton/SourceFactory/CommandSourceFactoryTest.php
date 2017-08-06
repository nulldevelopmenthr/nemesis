<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\SourceFactory;

use NullDev\BroadwaySkeleton\SourceFactory\CommandSourceFactory;
use NullDev\Skeleton\Definition\PHP\DefinitionFactory;
use NullDev\Skeleton\Source\ClassSourceFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\SourceFactory\CommandSourceFactory
 * @group nemesis
 */
class CommandSourceFactoryTest extends PHPUnit_Framework_TestCase
{
    /** @var CommandSourceFactory */
    private $commandSourceFactory;

    public function setUp(): void
    {
        $this->commandSourceFactory = new CommandSourceFactory(new ClassSourceFactory(), new DefinitionFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
