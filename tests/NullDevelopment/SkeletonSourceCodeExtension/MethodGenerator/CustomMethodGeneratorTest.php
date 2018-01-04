<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\CustomMethodGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\CustomMethodGenerator
 * @group  todo
 */
class CustomMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var CustomMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new CustomMethodGenerator();
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
