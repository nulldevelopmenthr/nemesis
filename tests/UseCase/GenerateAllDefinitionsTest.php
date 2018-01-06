<?php

declare(strict_types=1);

namespace Tests\UseCase;

use League\Tactician\CommandBus;
use NullDev\Skeleton\File\OutputResource2;
use NullDev\Skeleton\Path\Readers\FinderFactory;
use NullDevelopment\Skeleton\Core\DefinitionLoaderCollection;
use SplFileInfo;
use Symfony\Component\Filesystem\Filesystem;
use Tests\NullDev\AssertOutputTrait;
use Tests\TestCase\SfTestCase;

/**
 * @group  full
 * @coversDefaultClass \NullDevelopment\Skeleton
 */
class GenerateAllDefinitionsTest extends SfTestCase
{
    use AssertOutputTrait;

    /** @var CommandBus */
    protected $commandBus;

    /** @var DefinitionLoaderCollection */
    private $loaderCollection;

    public function setUp()
    {
        parent::setUp();
        $this->commandBus       = $this->getService(CommandBus::class);
        $this->loaderCollection = $this->getService(DefinitionLoaderCollection::class);
    }

    public function testAllLoadersAreImportedProperly()
    {
        self::assertCount(18, $this->loaderCollection->getLoaders());
    }

    public function testAllDefinitionsContentIsLoaded()
    {
        self::assertCount(24, $this->provideDefinitionsContent());
    }

    public function testAllDefinitionsAreCreated()
    {
        self::assertCount(24, $this->provideDefinitions());
    }

    public function testTotalCountOfAllResults()
    {
        $totalCount = 0;
        foreach ($this->provideDefinitions() as $definition) {
            $results = $this->commandBus->handle($definition);
            $totalCount += count($results);
        }

        // Since there are no tests or specs for interfaces & traits, count is not 3x
        self::assertEquals(63, $totalCount);
    }

    public function testAllDefinitions()
    {
        $skipped    = false;
        $totalCount = 0;
        foreach ($this->provideDefinitions() as $definition) {
            $results = $this->commandBus->handle($definition);
            $totalCount += count($results);

            /** @var OutputResource2 $result */
            foreach ($results as $result) {
                $filePath        = $this->getFilePath($result);
                $generatedOutput = $result->getOutput();

                if (false === file_exists($filePath)) {
                    $this->getService(Filesystem::class)->dumpFile($filePath, $generatedOutput);
                    $skipped = true;
                } else {
                    self::assertEquals(file_get_contents($filePath), $generatedOutput);
                }
            }
        }

        // Since there are no tests or specs for interfaces & traits, count is not 3x
        self::assertEquals(63, $totalCount);

        if (true === $skipped) {
            $this->markTestIncomplete('Output was generated!');
        }
    }

    protected function getFilePath(OutputResource2 $outputResource): string
    {
        $fileName = str_replace('\\', '/', $outputResource->getClassName()->getFullName());

        return $this->getOutputFolder().$fileName.'.output';
    }

    protected function getOutputFolder(): string
    {
        return __DIR__.'/output/';
    }

    public function provideDefinitions(): array
    {
        $definitions = [];

        foreach ($this->provideDefinitionsContent() as $item) {
            $definitions[] = $this->loaderCollection->findAndLoad($item);
        }

        return $definitions;
    }

    public function provideDefinitionsContent(): array
    {
        $path  = getcwd().'/definitions';
        $yamls = $this->getService(FinderFactory::class)->create()->files()->in($path)->name('*.yaml');

        $definitionsContent = [];

        /** @var SplFileInfo $yaml */
        foreach ($yamls as $yaml) {
            $definitionsContent[] = $this->loadDefinitionYaml($yaml->getFilename(), $yaml->getPath());
        }

        return $definitionsContent;
    }
}
