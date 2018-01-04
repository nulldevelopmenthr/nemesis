<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\UuidV4CreateMethodGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\UuidV4CreateMethodGenerator
 * @group  todo
 */
class UuidV4CreateMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var UuidV4CreateMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new UuidV4CreateMethodGenerator();
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
