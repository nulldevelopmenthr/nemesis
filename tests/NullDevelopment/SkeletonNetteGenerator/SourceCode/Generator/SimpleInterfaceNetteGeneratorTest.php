<?php

declare(strict_types=1);

namespace tests\NullDevelopment\SkeletonNetteGenerator\SourceCode\Generator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonNetteGenerator\SourceCode\Generator\SimpleInterfaceNetteGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\SourceCode\Generator\SimpleInterfaceNetteGenerator
 * @group todo
 */
class SimpleInterfaceNetteGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SimpleInterfaceNetteGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new SimpleInterfaceNetteGenerator();
    }

    public function testSupports()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testHandleInterfaceDefinition()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGenerate()
    {
        $this->markTestSkipped('Skipping');
    }
}
