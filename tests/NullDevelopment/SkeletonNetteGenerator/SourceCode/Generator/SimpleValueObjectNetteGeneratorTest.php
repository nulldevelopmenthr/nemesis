<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonNetteGenerator\SourceCode\Generator;

use League\Tactician\CommandBus;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\SimpleValueObjectLoader;
use NullDevelopment\SkeletonNetteGenerator\SourceCode\Generator\SimpleValueObjectNetteGenerator;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\SourceCode\Generator\SimpleValueObjectNetteGenerator
 * @group  generator
 */
class SimpleValueObjectNetteGeneratorTest extends SfTestCase
{
    /** @var SimpleValueObjectLoader */
    private $loader;
    /** @var SimpleValueObjectNetteGenerator */
    private $generator;
    /** @var CommandBus */
    private $commandBus;

    public function setUp()
    {
        parent::setUp();
        $this->loader     = $this->getService(SimpleValueObjectLoader::class);
        $this->generator  = new SimpleValueObjectNetteGenerator();
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
        self::assertEquals(file_get_contents(__DIR__.'/output/'.$configurationName.'.output'), $output);
    }

    public function provideYamlConfigurationNames(): array
    {
        return [
            ['MyVendor/User/Username'],
            ['MyVendor/Product/ProductWeight'],
        ];
    }

    private function prepareForOutput(string $result): string
    {
        $result = str_replace("\t", '    ', $result);

        return '<?php'.PHP_EOL.PHP_EOL.'declare(strict_types=1);'.PHP_EOL.PHP_EOL.$result;
    }
}
