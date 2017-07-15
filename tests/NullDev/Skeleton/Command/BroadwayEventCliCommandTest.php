<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Command;

use NullDev\Skeleton\Command\BroadwayEventCliCommand;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Command\BroadwayEventCliCommand
 * @group nemesis
 */
class BroadwayEventCliCommandTest extends PHPUnit_Framework_TestCase
{
    /** @var BroadwayEventCliCommand */
    private $broadwayEventCliCommand;

    public function setUp(): void
    {
        $this->broadwayEventCliCommand = new BroadwayEventCliCommand('name');
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
