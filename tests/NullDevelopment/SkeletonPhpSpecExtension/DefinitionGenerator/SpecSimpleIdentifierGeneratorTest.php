<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator;

use Generator;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleIdentifier;
use NullDevelopment\SkeletonPhpSpecExtension\Definition\SpecSimpleIdentifier;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory\SpecSimpleIdentifierFactory;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecSimpleIdentifierGenerator;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecSimpleIdentifierGenerator
 * @group  integration
 */
class SpecSimpleIdentifierGeneratorTest extends BaseSpecDefinitionGeneratorTestCase
{
    /** @var SpecSimpleIdentifierGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(SpecSimpleIdentifierGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(SpecSimpleIdentifier $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(SpecSimpleIdentifier $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(SpecSimpleIdentifier $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideDefinitions(): Generator
    {
        $inputs = $this->loadAllDefinitionsFromFiles();

        $specFactory = $this->getService(SpecSimpleIdentifierFactory::class);

        foreach ($inputs as $definition) {
            if ($definition instanceof SimpleIdentifier) {
                $specDefinition = $specFactory->createFromSimpleIdentifier($definition);

                if (true === $this->sut->supports($specDefinition)) {
                    yield[$specDefinition, __DIR__.'/output/'.$specDefinition->getClassName().'.output'];
                }
            }
        }
    }
}
