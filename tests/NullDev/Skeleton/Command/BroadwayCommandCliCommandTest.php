<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Command;

use NullDev\Skeleton\Command\BroadwayCommandCliCommand;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Command\BroadwayCommandCliCommand
 * @group nemesis
 */
class BroadwayCommandCliCommandTest extends PHPUnit_Framework_TestCase
{
    /** @var BroadwayCommandCliCommand */
    private $broadwayCommandCliCommand;

    public function setUp(): void
    {
        $this->broadwayCommandCliCommand = new BroadwayCommandCliCommand('name');
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
