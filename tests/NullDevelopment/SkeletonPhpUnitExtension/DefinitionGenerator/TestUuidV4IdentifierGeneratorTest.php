<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator;

use Generator;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonPhpUnitExtension\Definition\TestUuidV4Identifier;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestUuidV4IdentifierFactory;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestUuidV4IdentifierGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\UuidV4Identifier;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestUuidV4IdentifierGenerator
 * @group  integration
 */
class TestUuidV4IdentifierGeneratorTest extends BaseTestDefinitionGeneratorTestCase
{
    /** @var TestUuidV4IdentifierGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(TestUuidV4IdentifierGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(TestUuidV4Identifier $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(TestUuidV4Identifier $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(TestUuidV4Identifier $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideDefinitions(): Generator
    {
        $inputs = $this->loadAllDefinitionsFromFiles();

        $testFactory = $this->getService(TestUuidV4IdentifierFactory::class);

        foreach ($inputs as $definition) {
            if ($definition instanceof UuidV4Identifier) {
                $testDefinition = $testFactory->createFromUuidV4Identifier($definition);

                if (true === $this->sut->supports($testDefinition)) {
                    yield[$testDefinition, __DIR__.'/output/'.$testDefinition->getInstanceOfName().'.output'];
                }
            }
        }
    }
}
