<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Path;

use NullDev\Skeleton\Path\Psr0Path;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Path\Psr0Path
 * @group nemesis
 */
class Psr0PathTest extends PHPUnit_Framework_TestCase
{
    /** @var Psr0Path */
    private $psr0Path;

    public function setUp(): void
    {
        $this->psr0Path = new Psr0Path('src/', '');
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
