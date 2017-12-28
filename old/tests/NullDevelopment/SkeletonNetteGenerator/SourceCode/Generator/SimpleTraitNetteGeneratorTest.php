<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonNetteGenerator\SourceCode\Generator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonNetteGenerator\SourceCode\Generator\SimpleTraitNetteGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\SourceCode\Generator\SimpleTraitNetteGenerator
 * @group todo
 */
class SimpleTraitNetteGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SimpleTraitNetteGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new SimpleTraitNetteGenerator();
    }

    public function testSupports()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testHandleTraitDefinition()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGenerate()
    {
        $this->markTestSkipped('Skipping');
    }
}
