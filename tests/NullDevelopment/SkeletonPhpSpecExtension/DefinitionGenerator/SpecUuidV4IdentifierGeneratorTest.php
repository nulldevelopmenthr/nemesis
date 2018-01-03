<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator;

use Generator;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonPhpSpecExtension\Definition\SpecUuidV4Identifier;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory\SpecUuidV4IdentifierFactory;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecUuidV4IdentifierGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\UuidV4Identifier;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecUuidV4IdentifierGenerator
 * @group  integration
 */
class SpecUuidV4IdentifierGeneratorTest extends BaseSpecDefinitionGeneratorTestCase
{
    /** @var SpecUuidV4IdentifierGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(SpecUuidV4IdentifierGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(SpecUuidV4Identifier $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(SpecUuidV4Identifier $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(SpecUuidV4Identifier $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideDefinitions(): Generator
    {
        $inputs = $this->loadAllDefinitionsFromFiles();

        $specFactory = $this->getService(SpecUuidV4IdentifierFactory::class);

        foreach ($inputs as $definition) {
            if ($definition instanceof UuidV4Identifier) {
                $specDefinition = $specFactory->createFromUuidV4Identifier($definition);

                if (true === $this->sut->supports($specDefinition)) {
                    yield[$specDefinition, __DIR__.'/output/'.$specDefinition->getInstanceOfName().'.output'];
                }
            }
        }
    }
}
