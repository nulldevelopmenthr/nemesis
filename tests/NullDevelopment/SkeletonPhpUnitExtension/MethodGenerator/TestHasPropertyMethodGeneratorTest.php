<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator\TestHasPropertyMethodGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator\TestHasPropertyMethodGenerator
 * @group  todo
 */
class TestHasPropertyMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|ExampleMaker */
    private $exampleMaker;

    /** @var TestHasPropertyMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->exampleMaker = Mockery::mock(ExampleMaker::class);
        $this->sut          = new TestHasPropertyMethodGenerator($this->exampleMaker);
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
