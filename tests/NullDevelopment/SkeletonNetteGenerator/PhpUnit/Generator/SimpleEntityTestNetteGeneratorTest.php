<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonNetteGenerator\PhpUnit\Generator;

use League\Tactician\CommandBus;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\SimpleEntityLoader;
use NullDevelopment\SkeletonNetteGenerator\PhpUnit\Generator\SimpleEntityTestNetteGenerator;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\PhpUnit\Generator\SimpleEntityTestNetteGenerator
 * @group  generator
 */
class SimpleEntityTestNetteGeneratorTest extends SfTestCase
{
    /** @var SimpleEntityLoader */
    private $loader;
    /** @var SimpleEntityTestNetteGenerator */
    private $generator;
    /** @var CommandBus */
    private $commandBus;

    public function setUp()
    {
        parent::setUp();
        $this->loader     = $this->getService(SimpleEntityLoader::class);
        $this->generator  = new SimpleEntityTestNetteGenerator();
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
            ['MyVendor/UserEntity'],
            ['MyVendor/ProductEntity'],
        ];
    }

    private function prepareForOutput(string $result): string
    {
        $result = str_replace("\t", '    ', $result);

        return '<?php'.PHP_EOL.PHP_EOL.'declare(strict_types=1);'.PHP_EOL.PHP_EOL.$result;
    }
}
