<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator;

use Generator;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonPhpUnitExtension\Definition\TestSimpleIdentifier;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestSimpleIdentifierFactory;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestSimpleIdentifierGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\SimpleIdentifier;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestSimpleIdentifierGenerator
 * @group  integration
 */
class TestSimpleIdentifierGeneratorTest extends BaseTestDefinitionGeneratorTestCase
{
    /** @var TestSimpleIdentifierGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(TestSimpleIdentifierGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(TestSimpleIdentifier $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(TestSimpleIdentifier $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(TestSimpleIdentifier $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideDefinitions(): Generator
    {
        $inputs = $this->loadAllDefinitionsFromFiles();

        $testFactory = $this->getService(TestSimpleIdentifierFactory::class);

        foreach ($inputs as $definition) {
            if ($definition instanceof SimpleIdentifier) {
                $testDefinition = $testFactory->createFromSimpleIdentifier($definition);

                if (true === $this->sut->supports($testDefinition)) {
                    yield[$testDefinition, __DIR__.'/output/'.$testDefinition->getClassName().'.output'];
                }
            }
        }
    }
}
