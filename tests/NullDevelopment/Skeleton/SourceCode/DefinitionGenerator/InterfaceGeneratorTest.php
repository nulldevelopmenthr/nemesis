<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\InterfaceGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\InterfaceGenerator
 * @group  todo
 */
class InterfaceGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var array */
    private $methodGenerators;
    /** @var InterfaceGenerator */
    private $sut;

    public function setUp()
    {
        $this->methodGenerators = [];
        $this->sut              = new InterfaceGenerator($this->methodGenerators);
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

    public function testHandleInterfaceDefinition()
    {
        $this->markTestSkipped('Skipping');
    }
}
