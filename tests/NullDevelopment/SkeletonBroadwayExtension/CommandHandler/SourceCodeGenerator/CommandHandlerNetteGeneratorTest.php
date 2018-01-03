<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCodeGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode\CommandHandler;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCodeGenerator\CommandHandlerNetteGenerator;
use Tests\NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator\BaseDefinitionGeneratorTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCodeGenerator\CommandHandlerNetteGenerator
 * @group  integration
 */
class CommandHandlerNetteGeneratorTest extends BaseDefinitionGeneratorTestCase
{
    /** @var CommandHandlerNetteGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(CommandHandlerNetteGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(CommandHandler $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(CommandHandler $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(CommandHandler $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    protected function getOutputFolder(): string
    {
        return __DIR__.'/output/';
    }
}
