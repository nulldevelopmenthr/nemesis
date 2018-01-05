<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCodeGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCodeGenerator\DoctrineReadFactoryGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCodeGenerator\DoctrineReadFactoryGenerator
 * @group todo
 */
class DoctrineReadFactoryGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var array */
    private $methodGenerators;

    /** @var DoctrineReadFactoryGenerator */
    private $sut;

    public function setUp()
    {
        $this->methodGenerators = [];
        $this->sut              = new DoctrineReadFactoryGenerator($this->methodGenerators);
    }

    public function testSupports()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testHandleDoctrineReadFactory()
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
