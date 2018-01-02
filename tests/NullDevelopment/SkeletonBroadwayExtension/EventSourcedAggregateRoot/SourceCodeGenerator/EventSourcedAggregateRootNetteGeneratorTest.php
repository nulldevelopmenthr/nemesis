<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\SourceCodeGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\SourceCode\EventSourcedAggregateRoot;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\SourceCodeGenerator\EventSourcedAggregateRootNetteGenerator;
use Tests\NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\BaseDefinitionGeneratorTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\SourceCodeGenerator\EventSourcedAggregateRootNetteGenerator
 * @group  integration
 */
class EventSourcedAggregateRootNetteGeneratorTest extends BaseDefinitionGeneratorTestCase
{
    /** @var EventSourcedAggregateRootNetteGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(EventSourcedAggregateRootNetteGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(EventSourcedAggregateRoot $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(EventSourcedAggregateRoot $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(EventSourcedAggregateRoot $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    protected function getOutputFolder(): string
    {
        return __DIR__.'/output/';
    }
}
