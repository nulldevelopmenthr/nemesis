<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Command;

use NullDev\Skeleton\Command\BroadwayModelCliCommand;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Command\BroadwayModelCliCommand
 * @group nemesis
 */
class BroadwayModelCliCommandTest extends PHPUnit_Framework_TestCase
{
    /** @var BroadwayModelCliCommand */
    private $broadwayModelCliCommand;

    public function setUp(): void
    {
        $this->broadwayModelCliCommand = new BroadwayModelCliCommand('name');
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
