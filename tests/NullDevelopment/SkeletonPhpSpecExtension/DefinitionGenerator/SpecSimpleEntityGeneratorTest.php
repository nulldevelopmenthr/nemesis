<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecSimpleEntityGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecSimpleEntityGenerator
 * @group todo
 */
class SpecSimpleEntityGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var array */
    private $methodGenerators;

    /** @var SpecSimpleEntityGenerator */
    private $sut;

    public function setUp()
    {
        $this->methodGenerators = [];
        $this->sut              = new SpecSimpleEntityGenerator($this->methodGenerators);
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
