<?php

declare(strict_types=1);

namespace tests\NullDev\Nemesis\Command;

use NullDev\Nemesis\Command\IndexCliCommand;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Nemesis\Command\IndexCliCommand
 * @group nemesis
 */
class IndexCliCommandTest extends PHPUnit_Framework_TestCase
{
    /** @var IndexCliCommand */
    private $indexCliCommand;

    public function setUp(): void
    {
        $this->indexCliCommand = new IndexCliCommand('name');
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
