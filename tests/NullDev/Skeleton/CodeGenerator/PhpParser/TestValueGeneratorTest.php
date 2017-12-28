<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\CodeGenerator\PhpParser;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Skeleton\CodeGenerator\PhpParser\TestValueGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\CodeGenerator\PhpParser\TestValueGenerator
 * @group  todo
 */
class TestValueGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var TestValueGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new TestValueGenerator();
    }

    public function testGenerate()
    {
        $this->markTestSkipped('Skipping');
    }
}
