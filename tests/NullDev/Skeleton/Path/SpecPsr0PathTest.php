<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Path;

use NullDev\Skeleton\Path\SpecPsr0Path;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Path\SpecPsr0Path
 * @group nemesis
 */
class SpecPsr0PathTest extends PHPUnit_Framework_TestCase
{
    /** @var SpecPsr0Path */
    private $specPsr0Path;

    public function setUp(): void
    {
        $this->specPsr0Path = new SpecPsr0Path('spec/', '');
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
