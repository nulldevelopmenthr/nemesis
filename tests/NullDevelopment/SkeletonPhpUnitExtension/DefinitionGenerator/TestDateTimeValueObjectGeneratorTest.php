<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator;

use Generator;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonPhpUnitExtension\Definition\TestDateTimeValueObject;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestDateTimeValueObjectFactory;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestDateTimeValueObjectGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\DateTimeValueObject;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestDateTimeValueObjectGenerator
 * @group  integration
 */
class TestDateTimeValueObjectGeneratorTest extends BaseTestDefinitionGeneratorTestCase
{
    /** @var TestDateTimeValueObjectGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(TestDateTimeValueObjectGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(TestDateTimeValueObject $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(TestDateTimeValueObject $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(TestDateTimeValueObject $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideDefinitions(): Generator
    {
        $inputs = $this->loadAllDefinitionsFromFiles();

        $testFactory = $this->getService(TestDateTimeValueObjectFactory::class);

        foreach ($inputs as $definition) {
            if ($definition instanceof DateTimeValueObject) {
                $testDefinition = $testFactory->createFromDateTimeValueObject($definition);

                if (true === $this->sut->supports($testDefinition)) {
                    yield[$testDefinition, __DIR__.'/output/'.$testDefinition->getClassName().'.output'];
                }
            }
        }
    }
}
