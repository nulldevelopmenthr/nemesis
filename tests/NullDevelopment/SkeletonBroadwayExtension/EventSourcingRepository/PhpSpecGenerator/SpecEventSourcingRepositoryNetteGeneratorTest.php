<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpSpecGenerator;

use Generator;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpSpec\SpecEventSourcingRepository;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpSpec\SpecEventSourcingRepositoryFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpSpecGenerator\SpecEventSourcingRepositoryNetteGenerator;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCode\EventSourcingRepository;
use Tests\NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\BaseSpecDefinitionGeneratorTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpSpecGenerator\SpecEventSourcingRepositoryNetteGenerator
 * @group  integration
 */
class SpecEventSourcingRepositoryNetteGeneratorTest extends BaseSpecDefinitionGeneratorTestCase
{
    /** @var SpecEventSourcingRepositoryNetteGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = new SpecEventSourcingRepositoryNetteGenerator([]);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(SpecEventSourcingRepository $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(SpecEventSourcingRepository $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(SpecEventSourcingRepository $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideDefinitions(): Generator
    {
        $inputs = $this->loadAllDefinitionsFromFiles();

        $specFactory = $this->getService(SpecEventSourcingRepositoryFactory::class);

        foreach ($inputs as $definition) {
            if ($definition instanceof EventSourcingRepository) {
                $specDefinition = $specFactory->createFromEventSourcingRepository($definition);

                if (true === $this->sut->supports($specDefinition)) {
                    yield[$specDefinition, __DIR__.'/output/'.$specDefinition->getClassName().'.output'];
                }
            }
        }
    }
}
