<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnitGenerator;

use Generator;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnit\TestCommandHandler;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnit\TestCommandHandlerFactory;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnitGenerator\TestCommandHandlerNetteGenerator;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode\CommandHandler;
use Tests\NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\BaseTestDefinitionGeneratorTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnitGenerator\TestCommandHandlerNetteGenerator
 * @group  integration
 */
class TestCommandHandlerNetteGeneratorTest extends BaseTestDefinitionGeneratorTestCase
{
    /** @var TestCommandHandlerNetteGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = new TestCommandHandlerNetteGenerator([]);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(TestCommandHandler $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(TestCommandHandler $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(TestCommandHandler $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideDefinitions(): Generator
    {
        $inputs = $this->loadAllDefinitionsFromFiles();

        $testFactory = $this->getService(TestCommandHandlerFactory::class);

        foreach ($inputs as $definition) {
            if ($definition instanceof CommandHandler) {
                $testDefinition = $testFactory->createFromCommandHandler($definition);

                if (true === $this->sut->supports($testDefinition)) {
                    yield[$testDefinition, __DIR__.'/output/'.$testDefinition->getClassName().'.output'];
                }
            }
        }
    }
}
