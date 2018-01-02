<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnitGenerator;

use Generator;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnit\TestEventSourcedAggregateRoot;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnit\TestEventSourcedAggregateRootFactory;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnitGenerator\TestEventSourcedAggregateRootNetteGenerator;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\SourceCode\EventSourcedAggregateRoot;
use Tests\NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\BaseTestDefinitionGeneratorTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\PhpUnitGenerator\TestEventSourcedAggregateRootNetteGenerator
 * @group  integration
 */
class TestEventSourcedAggregateRootNetteGeneratorTest extends BaseTestDefinitionGeneratorTestCase
{
    /** @var TestEventSourcedAggregateRootNetteGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(TestEventSourcedAggregateRootNetteGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(TestEventSourcedAggregateRoot $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(TestEventSourcedAggregateRoot $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(TestEventSourcedAggregateRoot $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideDefinitions(): Generator
    {
        $inputs = $this->loadAllDefinitionsFromFiles();

        $testFactory = $this->getService(TestEventSourcedAggregateRootFactory::class);

        foreach ($inputs as $definition) {
            if ($definition instanceof EventSourcedAggregateRoot) {
                $testDefinition = $testFactory->createFromEventSourcedAggregateRoot($definition);

                if (true === $this->sut->supports($testDefinition)) {
                    yield[$testDefinition, __DIR__.'/output/'.$testDefinition->getClassName().'.output'];
                }
            }
        }
    }
}
