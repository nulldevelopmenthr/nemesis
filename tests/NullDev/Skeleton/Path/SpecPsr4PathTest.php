<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Path;

use NullDev\Skeleton\Path\SpecPsr4Path;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Path\SpecPsr4Path
 * @group nemesis
 */
class SpecPsr4PathTest extends PHPUnit_Framework_TestCase
{
    /** @var SpecPsr4Path */
    private $specPsr4Path;

    public function setUp(): void
    {
        $this->specPsr4Path = new SpecPsr4Path('spec/', 'spec\\');
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
