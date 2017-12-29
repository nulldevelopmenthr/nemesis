<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\TraitGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\TraitGenerator
 * @group  todo
 */
class TraitGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var array */
    private $methodGenerators;
    /** @var TraitGenerator */
    private $sut;

    public function setUp()
    {
        $this->methodGenerators = [];
        $this->sut              = new TraitGenerator($this->methodGenerators);
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

    public function testHandleTraitDefinition()
    {
        $this->markTestSkipped('Skipping');
    }
}
