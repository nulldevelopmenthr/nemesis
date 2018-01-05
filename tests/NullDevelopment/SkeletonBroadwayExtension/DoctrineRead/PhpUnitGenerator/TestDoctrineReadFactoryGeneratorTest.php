<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator\TestDoctrineReadFactoryGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnitGenerator\TestDoctrineReadFactoryGenerator
 * @group todo
 */
class TestDoctrineReadFactoryGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var array */
    private $methodGenerators;

    /** @var TestDoctrineReadFactoryGenerator */
    private $sut;

    public function setUp()
    {
        $this->methodGenerators = [];
        $this->sut              = new TestDoctrineReadFactoryGenerator($this->methodGenerators);
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
