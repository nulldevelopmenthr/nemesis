<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\Type\TraitDefinition;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\TraitGenerator;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\TraitGenerator
 * @group  integration
 */
class TraitGeneratorTest extends BaseDefinitionGeneratorTestCase
{
    /** @var TraitGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(TraitGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(TraitDefinition $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(TraitDefinition $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(TraitDefinition $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }
}
