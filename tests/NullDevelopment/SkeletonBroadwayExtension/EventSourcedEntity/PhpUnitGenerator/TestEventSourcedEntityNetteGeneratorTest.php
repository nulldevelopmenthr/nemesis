<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnitGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnitGenerator\TestEventSourcedEntityNetteGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnitGenerator\TestEventSourcedEntityNetteGenerator
 * @group todo
 */
class TestEventSourcedEntityNetteGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var array */
    private $methodGenerators;

    /** @var TestEventSourcedEntityNetteGenerator */
    private $sut;

    public function setUp()
    {
        $this->methodGenerators = [];
        $this->sut              = new TestEventSourcedEntityNetteGenerator($this->methodGenerators);
    }

    public function testSupports()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGenerate()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGenerateAsString()
    {
        $this->markTestSkipped('Skipping');
    }
}
