<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\Event\SourceCodeGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonBroadwayExtension\Event\SourceCode\Event;
use NullDevelopment\SkeletonBroadwayExtension\Event\SourceCodeGenerator\EventNetteGenerator;
use Tests\NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\BaseDefinitionGeneratorTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\Event\SourceCodeGenerator\EventNetteGenerator
 * @group  integration
 */
class EventNetteGeneratorTest extends BaseDefinitionGeneratorTestCase
{
    /** @var EventNetteGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(EventNetteGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(Event $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(Event $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(Event $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    protected function getOutputFolder(): string
    {
        return __DIR__.'/output/';
    }
}
