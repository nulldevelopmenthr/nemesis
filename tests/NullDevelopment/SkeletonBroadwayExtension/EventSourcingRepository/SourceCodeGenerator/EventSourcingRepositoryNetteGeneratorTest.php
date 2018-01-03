<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCodeGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCode\EventSourcingRepository;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCodeGenerator\EventSourcingRepositoryNetteGenerator;
use Tests\NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator\BaseDefinitionGeneratorTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCodeGenerator\EventSourcingRepositoryNetteGenerator
 * @group  integration
 */
class EventSourcingRepositoryNetteGeneratorTest extends BaseDefinitionGeneratorTestCase
{
    /** @var EventSourcingRepositoryNetteGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(EventSourcingRepositoryNetteGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(EventSourcingRepository $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(EventSourcingRepository $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(EventSourcingRepository $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    protected function getOutputFolder(): string
    {
        return __DIR__.'/output/';
    }
}
