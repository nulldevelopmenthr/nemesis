<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Path;

use NullDev\Skeleton\Path\Psr4Path;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Path\Psr4Path
 * @group nemesis
 */
class Psr4PathTest extends PHPUnit_Framework_TestCase
{
    /** @var Psr4Path */
    private $psr4Path;

    public function setUp(): void
    {
        $this->psr4Path = new Psr4Path('src/', 'Something\\');
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
