<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\SourceCodeGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\SourceCode\EventSourcedEntity;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\SourceCodeGenerator\EventSourcedEntityNetteGenerator;
use Tests\NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\BaseDefinitionGeneratorTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\SourceCodeGenerator\EventSourcedEntityNetteGenerator
 * @group  integration
 */
class EventSourcedEntityNetteGeneratorTest extends BaseDefinitionGeneratorTestCase
{
    /** @var EventSourcedEntityNetteGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(EventSourcedEntityNetteGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(EventSourcedEntity $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(EventSourcedEntity $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(EventSourcedEntity $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    protected function getOutputFolder(): string
    {
        return __DIR__.'/output/';
    }
}
