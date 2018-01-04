<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnitGenerator\Method;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnitGenerator\Method\TestCreateEventMethodGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnitGenerator\Method\TestCreateEventMethodGenerator
 * @group  todo
 */
class TestCreateEventMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|ExampleMaker */
    private $exampleMaker;

    /** @var TestCreateEventMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->exampleMaker = Mockery::mock(ExampleMaker::class);
        $this->sut          = new TestCreateEventMethodGenerator($this->exampleMaker);
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
