<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\SpecGenerator;

use NullDev\Skeleton\SpecGenerator\SpecGenerator;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\SpecGenerator\SpecGenerator
 * @group nemesis
 */
class SpecGeneratorTest extends PHPUnit_Framework_TestCase
{
    /** @var SpecGenerator */
    private $specGenerator;

    public function setUp(): void
    {
        $this->specGenerator = SpecGenerator::default();
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
