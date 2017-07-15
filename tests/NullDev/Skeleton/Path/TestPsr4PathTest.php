<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Path;

use NullDev\Skeleton\Path\TestPsr4Path;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Path\TestPsr4Path
 * @group nemesis
 */
class TestPsr4PathTest extends PHPUnit_Framework_TestCase
{
    /** @var TestPsr4Path */
    private $testPsr4Path;

    public function setUp(): void
    {
        $this->testPsr4Path = new TestPsr4Path('tests/', 'tests\\');
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
