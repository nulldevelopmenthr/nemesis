<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\MethodGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator\HasPropertyMethodGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\MethodGenerator\HasPropertyMethodGenerator
 * @group todo
 */
class HasPropertyMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var HasPropertyMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new HasPropertyMethodGenerator();
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
