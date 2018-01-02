<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\Command\SourceCodeGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonBroadwayExtension\Command\SourceCode\Command;
use NullDevelopment\SkeletonBroadwayExtension\Command\SourceCodeGenerator\CommandNetteGenerator;
use Tests\NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\BaseDefinitionGeneratorTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\Command\SourceCodeGenerator\CommandNetteGenerator
 * @group  integration
 */
class CommandNetteGeneratorTest extends BaseDefinitionGeneratorTestCase
{
    /** @var CommandNetteGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(CommandNetteGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(Command $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(Command $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(Command $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    protected function getOutputFolder(): string
    {
        return __DIR__.'/output/';
    }
}
