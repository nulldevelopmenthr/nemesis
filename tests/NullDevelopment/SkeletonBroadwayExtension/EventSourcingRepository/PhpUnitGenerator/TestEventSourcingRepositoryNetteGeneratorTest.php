<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpUnitGenerator;

use Generator;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpUnit\TestEventSourcingRepository;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpUnit\TestEventSourcingRepositoryFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpUnitGenerator\TestEventSourcingRepositoryNetteGenerator;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCode\EventSourcingRepository;
use Tests\NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\BaseTestDefinitionGeneratorTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\PhpUnitGenerator\TestEventSourcingRepositoryNetteGenerator
 * @group  integration
 */
class TestEventSourcingRepositoryNetteGeneratorTest extends BaseTestDefinitionGeneratorTestCase
{
    /** @var TestEventSourcingRepositoryNetteGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(TestEventSourcingRepositoryNetteGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(TestEventSourcingRepository $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(TestEventSourcingRepository $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(TestEventSourcingRepository $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideDefinitions(): Generator
    {
        $inputs = $this->loadAllDefinitionsFromFiles();

        $testFactory = $this->getService(TestEventSourcingRepositoryFactory::class);

        foreach ($inputs as $definition) {
            if ($definition instanceof EventSourcingRepository) {
                $testDefinition = $testFactory->createFromEventSourcingRepository($definition);

                if (true === $this->sut->supports($testDefinition)) {
                    yield[$testDefinition, __DIR__.'/output/'.$testDefinition->getClassName().'.output'];
                }
            }
        }
    }
}
