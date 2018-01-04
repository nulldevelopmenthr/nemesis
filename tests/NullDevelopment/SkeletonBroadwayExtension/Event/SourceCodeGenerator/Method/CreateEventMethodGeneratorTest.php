<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\Event\SourceCodeGenerator\Method;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonBroadwayExtension\Event\SourceCodeGenerator\Method\CreateEventMethodGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\Event\SourceCodeGenerator\Method\CreateEventMethodGenerator
 * @group  todo
 */
class CreateEventMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var CreateEventMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new CreateEventMethodGenerator();
    }

    public function testSupports()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetMethodGeneratorPriority()
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
