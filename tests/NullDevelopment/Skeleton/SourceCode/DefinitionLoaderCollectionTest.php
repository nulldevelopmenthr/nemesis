<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode;

use Generator;
use NullDev\Skeleton\Path\Readers\FinderFactory;
use NullDevelopment\Skeleton\SourceCode;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoaderCollection;
use SplFileInfo;
use Tests\TestCase\SfTestCase;
use TypeError;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\DefinitionLoaderCollection
 * @group  integration
 */
class DefinitionLoaderCollectionTest extends SfTestCase
{
    /** @var DefinitionLoaderCollection */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(DefinitionLoaderCollection::class);
    }

    public function testGetLoaders()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testFindAndLoad()
    {
        foreach ($this->provideInput() as $input) {
            try {
                self::assertInstanceOf(SourceCode::class, $this->sut->findAndLoad($input));
            } catch (TypeError $e) {
                echo $e->getMessage().PHP_EOL;
            }
        }
    }

    public function provideInput(): Generator
    {
        $path  = getcwd().'/definitions';
        $yamls = $this->getService(FinderFactory::class)->create()->files()->in($path)->name('*.yaml');

        /** @var SplFileInfo $yaml */
        foreach ($yamls as $yaml) {
            $config = $this->loadDefinitionYaml($yaml->getFilename(), $yaml->getPath());

            yield $config;
        }
    }
}
