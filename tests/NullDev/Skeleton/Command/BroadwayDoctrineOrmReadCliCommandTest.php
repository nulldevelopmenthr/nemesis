<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Command;

use NullDev\Skeleton\Command\BroadwayDoctrineOrmReadCliCommand;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Command\BroadwayDoctrineOrmReadCliCommand
 * @group nemesis
 */
class BroadwayDoctrineOrmReadCliCommandTest extends PHPUnit_Framework_TestCase
{
    /** @var BroadwayDoctrineOrmReadCliCommand */
    private $broadwayDoctrineOrmReadCliCommand;

    public function setUp(): void
    {
        $this->broadwayDoctrineOrmReadCliCommand = new BroadwayDoctrineOrmReadCliCommand('name');
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
