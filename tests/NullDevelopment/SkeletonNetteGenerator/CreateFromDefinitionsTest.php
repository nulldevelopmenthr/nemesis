<?php

declare(strict_types=1);

namespace tests\NullDevelopment\SkeletonNetteGenerator;

use Exception;
use League\Tactician\CommandBus;
use NullDev\Skeleton\Path\Readers\FinderFactory;
use NullDevelopment\Skeleton\ObjectConfigurationLoaderCollection;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\SplFileInfo;
use tests\TestCase\SfTestCase;

/**
 * @group  usecase
 * @coversNothing
 */
class CreateFromDefinitionsTest extends SfTestCase
{
    /** @var ObjectConfigurationLoaderCollection */
    private $loaders;
    /** @var CommandBus */
    private $commandBus;

    public function setUp()
    {
        parent::setUp();
        $this->loaders    = $this->getService(ObjectConfigurationLoaderCollection::class);
        $this->commandBus = $this->getService(CommandBus::class);
    }

    public function testGenerateAllExistingDefinitions()
    {
        $path    = getcwd().'/definitions';
        $yamls   = $this->getService(FinderFactory::class)->create()->files()->in($path)->name('*.yaml');
        $allIsOk = true;

        /** @var SplFileInfo $yaml */
        foreach ($yamls as $yaml) {
            $config = $this->loadDefinitionYaml($yaml->getFilename(), $yaml->getPath());

            $classDefinition = $this->loaders->findAndLoad($config);

            try {
                $results = $this->commandBus->handle($classDefinition);

                // Assert
                foreach ($results as $result) {
                    $this->getService(Filesystem::class)->dumpFile($result->getFileName(), $result->getOutput());
                }
            } catch (Exception $e) {
                echo $e->getMessage();
                $allIsOk = false;
            }
        }

        self::assertTrue($allIsOk);
    }
}
