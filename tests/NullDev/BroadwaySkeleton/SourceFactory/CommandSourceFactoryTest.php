<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\SourceFactory;

use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use NullDev\BroadwaySkeleton\SourceFactory\CommandSourceFactory;
use NullDev\Skeleton\Source\ClassSourceFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\SourceFactory\CommandSourceFactory
 * @group  nemesis
 */
class CommandSourceFactoryTest extends TestCase
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
