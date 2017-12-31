<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleCollection;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\SimpleCollectionGenerator;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\SimpleCollectionGenerator
 * @group  integration
 */
class SimpleCollectionGeneratorTest extends BaseDefinitionGeneratorTestCase
{
    /** @var SimpleCollectionGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(SimpleCollectionGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(SimpleCollection $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(SimpleCollection $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(SimpleCollection $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }
}
