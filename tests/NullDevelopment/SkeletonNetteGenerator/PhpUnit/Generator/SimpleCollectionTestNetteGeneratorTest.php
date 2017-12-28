<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonNetteGenerator\PhpUnit\Generator;

use League\Tactician\CommandBus;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\SimpleCollectionLoader;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonNetteGenerator\PhpUnit\Generator\SimpleCollectionTestNetteGenerator;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\PhpUnit\Generator\SimpleCollectionTestNetteGenerator
 * @group  generator
 */
class SimpleCollectionTestNetteGeneratorTest extends SfTestCase
{
    /** @var SimpleCollectionLoader */
    private $loader;
    /** @var SimpleCollectionTestNetteGenerator */
    private $generator;
    /** @var CommandBus */
    private $commandBus;

    public function setUp()
    {
        parent::setUp();
        $this->loader     = $this->getService(SimpleCollectionLoader::class);
        $this->generator  = new SimpleCollectionTestNetteGenerator(new ExampleMaker());
        $this->commandBus = $this->getService(CommandBus::class);
    }

    /** @dataProvider provideYamlConfigurationNames */
    public function testBuilderRun(string $configurationName)
    {
        // Arrange
        $inputConfig     = $this->loadDefinitionYaml($configurationName.'.yaml');
        $classDefinition = $this->loader->load($inputConfig);

        // Act
        $namespace = $this->generator->generate($classDefinition);

        $output = $this->prepareForOutput($namespace->__toString());

        // Assert
        self::assertEquals(file_get_contents(__DIR__.'/output/'.$configurationName.'Test.output'), $output);
    }

    public function provideYamlConfigurationNames(): array
    {
        return [
            ['MyVendor/ProductCollection'],
        ];
    }

    private function prepareForOutput(string $result): string
    {
        $result = str_replace("\t", '    ', $result);

        return '<?php'.PHP_EOL.PHP_EOL.'declare(strict_types=1);'.PHP_EOL.PHP_EOL.$result;
    }
}
