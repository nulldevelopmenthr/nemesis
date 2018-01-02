<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator;

use Generator;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\SourceCode\Definition\SingleValueObject;
use NullDevelopment\SkeletonPhpSpecExtension\Definition\SpecSingleValueObject;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory\SpecSingleValueObjectFactory;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecSingleValueObjectGenerator;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecSingleValueObjectGenerator
 * @group  integration
 */
class SpecSingleValueObjectGeneratorTest extends BaseSpecDefinitionGeneratorTestCase
{
    /** @var SpecSingleValueObjectGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(SpecSingleValueObjectGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(SpecSingleValueObject $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(SpecSingleValueObject $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(SpecSingleValueObject $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideDefinitions(): Generator
    {
        $inputs = $this->loadAllDefinitionsFromFiles();

        $specFactory = $this->getService(SpecSingleValueObjectFactory::class);

        foreach ($inputs as $definition) {
            if ($definition instanceof SingleValueObject) {
                $specDefinition = $specFactory->createFromSingleValueObject($definition);

                if (true === $this->sut->supports($specDefinition)) {
                    yield[$specDefinition, __DIR__.'/output/'.$specDefinition->getClassName().'.output'];
                }
            }
        }
    }
}
