<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\File;

use NullDev\Skeleton\File\MiroMiroMiro;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\File\MiroMiroMiro
 * @group nemesis
 */
class MiroMiroMiroTest extends PHPUnit_Framework_TestCase
{
    /** @var MiroMiroMiro */
    private $miroMiroMiro;

    public function setUp(): void
    {
        $this->miroMiroMiro = new MiroMiroMiro([]);
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
