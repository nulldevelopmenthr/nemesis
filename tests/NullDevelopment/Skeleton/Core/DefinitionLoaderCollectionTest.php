<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\Core;

use Generator;
use NullDev\Skeleton\Path\Readers\FinderFactory;
use NullDevelopment\Skeleton\Core\DefinitionLoaderCollection;
use NullDevelopment\Skeleton\SourceCode;
use SplFileInfo;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\Core\DefinitionLoaderCollection
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

    public function testAllLoadersAreImportedProperly()
    {
        self::assertCount(16, $this->sut->getLoaders());
    }

    public function testFindAndLoad()
    {
        foreach ($this->provideInput() as $input) {
            self::assertInstanceOf(SourceCode::class, $this->sut->findAndLoad($input));
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
