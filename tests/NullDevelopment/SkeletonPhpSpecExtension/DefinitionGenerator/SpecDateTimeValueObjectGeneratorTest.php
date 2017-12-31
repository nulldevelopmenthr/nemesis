<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator;

use Generator;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\SourceCode\Definition\DateTimeValueObject;
use NullDevelopment\SkeletonPhpSpecExtension\Definition\SpecDateTimeValueObject;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory\SpecDateTimeValueObjectFactory;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecDateTimeValueObjectGenerator;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecDateTimeValueObjectGenerator
 * @group  integration
 */
class SpecDateTimeValueObjectGeneratorTest extends BaseSpecDefinitionGeneratorTestCase
{
    /** @var SpecDateTimeValueObjectGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(SpecDateTimeValueObjectGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(SpecDateTimeValueObject $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(SpecDateTimeValueObject $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(SpecDateTimeValueObject $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideDefinitions(): Generator
    {
        $inputs = $this->loadAllDefinitionsFromFiles();

        $specFactory = $this->getService(SpecDateTimeValueObjectFactory::class);

        foreach ($inputs as $definition) {
            if ($definition instanceof DateTimeValueObject) {
                $specDefinition = $specFactory->createFromDateTimeValueObject($definition);

                if (true === $this->sut->supports($specDefinition)) {
                    yield[$specDefinition, __DIR__.'/output/'.$specDefinition->getClassName().'.output'];
                }
            }
        }
    }
}
