<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpecGenerator;

use Generator;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpec\SpecEvent;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpec\SpecEventFactory;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpecGenerator\SpecEventNetteGenerator;
use NullDevelopment\SkeletonBroadwayExtension\Event\SourceCode\Event;
use Tests\NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\BaseSpecDefinitionGeneratorTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpecGenerator\SpecEventNetteGenerator
 * @group  integration
 */
class SpecEventNetteGeneratorTest extends BaseSpecDefinitionGeneratorTestCase
{
    /** @var SpecEventNetteGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(SpecEventNetteGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(SpecEvent $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(SpecEvent $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(SpecEvent $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideDefinitions(): Generator
    {
        $inputs = $this->loadAllDefinitionsFromFiles();

        $specFactory = $this->getService(SpecEventFactory::class);

        foreach ($inputs as $definition) {
            if ($definition instanceof Event) {
                $specDefinition = $specFactory->createFromEvent($definition);

                if (true === $this->sut->supports($specDefinition)) {
                    yield[$specDefinition, __DIR__.'/output/'.$specDefinition->getInstanceOfName().'.output'];
                }
            }
        }
    }
}
