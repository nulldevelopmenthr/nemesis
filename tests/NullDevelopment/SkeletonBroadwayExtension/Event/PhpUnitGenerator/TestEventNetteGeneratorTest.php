<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnitGenerator;

use Generator;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnit\TestEvent;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnit\TestEventFactory;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnitGenerator\TestEventNetteGenerator;
use NullDevelopment\SkeletonBroadwayExtension\Event\SourceCode\Event;
use Tests\NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\BaseTestDefinitionGeneratorTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnitGenerator\TestEventNetteGenerator
 * @group  integration
 */
class TestEventNetteGeneratorTest extends BaseTestDefinitionGeneratorTestCase
{
    /** @var TestEventNetteGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = new TestEventNetteGenerator([]);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(TestEvent $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(TestEvent $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(TestEvent $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideDefinitions(): Generator
    {
        $inputs = $this->loadAllDefinitionsFromFiles();

        $testFactory = $this->getService(TestEventFactory::class);

        foreach ($inputs as $definition) {
            if ($definition instanceof Event) {
                $testDefinition = $testFactory->createFromEvent($definition);

                if (true === $this->sut->supports($testDefinition)) {
                    yield[$testDefinition, __DIR__.'/output/'.$testDefinition->getClassName().'.output'];
                }
            }
        }
    }
}
