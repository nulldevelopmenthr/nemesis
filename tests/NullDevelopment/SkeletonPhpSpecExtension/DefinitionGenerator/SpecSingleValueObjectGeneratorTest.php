<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecSingleValueObjectGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecSingleValueObjectGenerator
 * @group todo
 */
class SpecSingleValueObjectGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var array */
    private $methodGenerators;

    /** @var SpecSingleValueObjectGenerator */
    private $sut;

    public function setUp()
    {
        $this->methodGenerators = [];
        $this->sut              = new SpecSingleValueObjectGenerator($this->methodGenerators);
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
