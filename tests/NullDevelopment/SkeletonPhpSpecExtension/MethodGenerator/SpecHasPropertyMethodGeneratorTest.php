<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\SpecHasPropertyMethodGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\SpecHasPropertyMethodGenerator
 * @group todo
 */
class SpecHasPropertyMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|ExampleMaker */
    private $exampleMaker;

    /** @var SpecHasPropertyMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->exampleMaker = Mockery::mock(ExampleMaker::class);
        $this->sut          = new SpecHasPropertyMethodGenerator($this->exampleMaker);
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
