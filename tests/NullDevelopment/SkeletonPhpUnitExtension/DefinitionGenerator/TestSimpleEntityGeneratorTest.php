<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator;

use Generator;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonPhpUnitExtension\Definition\TestSimpleEntity;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestSimpleEntityFactory;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestSimpleEntityGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\SimpleEntity;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestSimpleEntityGenerator
 * @group  integration
 */
class TestSimpleEntityGeneratorTest extends BaseTestDefinitionGeneratorTestCase
{
    /** @var TestSimpleEntityGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(TestSimpleEntityGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(TestSimpleEntity $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(TestSimpleEntity $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(TestSimpleEntity $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideDefinitions(): Generator
    {
        $inputs = $this->loadAllDefinitionsFromFiles();

        $testFactory = $this->getService(TestSimpleEntityFactory::class);

        foreach ($inputs as $definition) {
            if ($definition instanceof SimpleEntity) {
                $testDefinition = $testFactory->createFromSimpleEntity($definition);

                if (true === $this->sut->supports($testDefinition)) {
                    yield[$testDefinition, __DIR__.'/output/'.$testDefinition->getClassName().'.output'];
                }
            }
        }
    }
}
