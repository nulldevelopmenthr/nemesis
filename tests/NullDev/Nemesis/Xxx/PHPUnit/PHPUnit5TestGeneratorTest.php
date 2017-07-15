<?php

declare(strict_types=1);

namespace tests\NullDev\Nemesis\Xxx\PHPUnit;

use NullDev\Nemesis\Xxx\PHPUnit\PHPUnit5TestGenerator;
use NullDev\Skeleton\Source\ClassSourceFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Nemesis\Xxx\PHPUnit\PHPUnit5TestGenerator
 * @group nemesis
 */
class PHPUnit5TestGeneratorTest extends PHPUnit_Framework_TestCase
{
    /** @var PHPUnit5TestGenerator */
    private $pHPUnit5TestGenerator;

    public function setUp(): void
    {
        $this->pHPUnit5TestGenerator = new PHPUnit5TestGenerator(new ClassSourceFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
