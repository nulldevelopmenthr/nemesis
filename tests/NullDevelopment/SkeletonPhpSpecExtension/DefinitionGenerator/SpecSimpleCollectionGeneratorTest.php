<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator;

use Generator;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonPhpSpecExtension\Definition\SpecSimpleCollection;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory\SpecSimpleCollectionFactory;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecSimpleCollectionGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\SimpleCollection;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecSimpleCollectionGenerator
 * @group  integration
 */
class SpecSimpleCollectionGeneratorTest extends BaseSpecDefinitionGeneratorTestCase
{
    /** @var SpecSimpleCollectionGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(SpecSimpleCollectionGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(SpecSimpleCollection $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(SpecSimpleCollection $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(SpecSimpleCollection $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideDefinitions(): Generator
    {
        $inputs = $this->loadAllDefinitionsFromFiles();

        $specFactory = $this->getService(SpecSimpleCollectionFactory::class);

        foreach ($inputs as $definition) {
            if ($definition instanceof SimpleCollection) {
                $specDefinition = $specFactory->createFromSimpleCollection($definition);

                if (true === $this->sut->supports($specDefinition)) {
                    yield[$specDefinition, __DIR__.'/output/'.$specDefinition->getClassName().'.output'];
                }
            }
        }
    }
}
