<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\ChainedGetterMethodGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\ChainedGetterMethodGenerator
 * @group  todo
 */
class ChainedGetterMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var ChainedGetterMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new ChainedGetterMethodGenerator();
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
