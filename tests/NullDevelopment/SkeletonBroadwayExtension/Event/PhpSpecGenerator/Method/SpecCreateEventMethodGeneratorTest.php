<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpecGenerator\Method;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpecGenerator\Method\SpecCreateEventMethodGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpecGenerator\Method\SpecCreateEventMethodGenerator
 * @group  todo
 */
class SpecCreateEventMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|ExampleMaker */
    private $exampleMaker;

    /** @var SpecCreateEventMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->exampleMaker = Mockery::mock(ExampleMaker::class);
        $this->sut          = new SpecCreateEventMethodGenerator($this->exampleMaker);
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
