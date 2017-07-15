<?php

declare(strict_types=1);

namespace tests\NullDev\Nemesis\Xxx\PHPUnit\CodeGenerator\PhpParser\Methods;

use NullDev\Nemesis\Xxx\PHPUnit\CodeGenerator\PhpParser\Methods\TestNothingGenerator;
use PhpParser\BuilderFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Nemesis\Xxx\PHPUnit\CodeGenerator\PhpParser\Methods\TestNothingGenerator
 * @group nemesis
 */
class TestNothingGeneratorTest extends PHPUnit_Framework_TestCase
{
    /** @var TestNothingGenerator */
    private $testNothingGenerator;

    public function setUp(): void
    {
        $this->testNothingGenerator = new TestNothingGenerator(new BuilderFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
