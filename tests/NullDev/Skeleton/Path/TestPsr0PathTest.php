<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Path;

use NullDev\Skeleton\Path\TestPsr0Path;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Path\TestPsr0Path
 * @group nemesis
 */
class TestPsr0PathTest extends PHPUnit_Framework_TestCase
{
    /** @var TestPsr0Path */
    private $testPsr0Path;

    public function setUp(): void
    {
        $this->testPsr0Path = new TestPsr0Path('tests/', '');
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
