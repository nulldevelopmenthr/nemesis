<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpecGenerator;

use Generator;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpec\SpecCommand;
use NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpec\SpecCommandFactory;
use NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpecGenerator\SpecCommandNetteGenerator;
use NullDevelopment\SkeletonBroadwayExtension\Command\SourceCode\Command;
use Tests\NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\BaseSpecDefinitionGeneratorTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpecGenerator\SpecCommandNetteGenerator
 * @group  integration
 */
class SpecCommandNetteGeneratorTest extends BaseSpecDefinitionGeneratorTestCase
{
    /** @var SpecCommandNetteGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(SpecCommandNetteGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(SpecCommand $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(SpecCommand $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(SpecCommand $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideDefinitions(): Generator
    {
        $inputs = $this->loadAllDefinitionsFromFiles();

        $specFactory = $this->getService(SpecCommandFactory::class);

        foreach ($inputs as $definition) {
            if ($definition instanceof Command) {
                $specDefinition = $specFactory->createFromCommand($definition);

                if (true === $this->sut->supports($specDefinition)) {
                    yield[$specDefinition, __DIR__.'/output/'.$specDefinition->getClassName().'.output'];
                }
            }
        }
    }
}
