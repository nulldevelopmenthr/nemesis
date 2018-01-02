<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnitGenerator;

use Generator;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnit\TestCommand;
use NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnit\TestCommandFactory;
use NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnitGenerator\TestCommandNetteGenerator;
use NullDevelopment\SkeletonBroadwayExtension\Command\SourceCode\Command;
use Tests\NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\BaseTestDefinitionGeneratorTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnitGenerator\TestCommandNetteGenerator
 * @group  integration
 */
class TestCommandNetteGeneratorTest extends BaseTestDefinitionGeneratorTestCase
{
    /** @var TestCommandNetteGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = new TestCommandNetteGenerator([]);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(TestCommand $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(TestCommand $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(TestCommand $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideDefinitions(): Generator
    {
        $inputs = $this->loadAllDefinitionsFromFiles();

        $testFactory = $this->getService(TestCommandFactory::class);

        foreach ($inputs as $definition) {
            if ($definition instanceof Command) {
                $testDefinition = $testFactory->createFromCommand($definition);

                if (true === $this->sut->supports($testDefinition)) {
                    yield[$testDefinition, __DIR__.'/output/'.$testDefinition->getClassName().'.output'];
                }
            }
        }
    }
}
