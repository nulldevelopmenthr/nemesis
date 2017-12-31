<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\Type\InterfaceDefinition;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\InterfaceGenerator;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\InterfaceGenerator
 * @group  integration
 */
class InterfaceGeneratorTest extends BaseDefinitionGeneratorTestCase
{
    /** @var InterfaceGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(InterfaceGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(InterfaceDefinition $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(InterfaceDefinition $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(InterfaceDefinition $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }
}
