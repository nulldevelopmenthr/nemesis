<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpecGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpecGenerator\SpecCommandHandlerNetteGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpecGenerator\SpecCommandHandlerNetteGenerator
 * @group todo
 */
class SpecCommandHandlerNetteGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var array */
    private $methodGenerators;

    /** @var SpecCommandHandlerNetteGenerator */
    private $sut;

    public function setUp()
    {
        $this->methodGenerators = [];
        $this->sut              = new SpecCommandHandlerNetteGenerator($this->methodGenerators);
    }

    public function testSupports()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGenerateAsString()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGenerate()
    {
        $this->markTestSkipped('Skipping');
    }
}
