<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\CodeGenerator;

use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\Source\ImprovedClassSource;

/**
 * @group  FullCoverage
 * @coversNothing
 */
class BroadwayGeneratorTest extends BaseCodeGeneratorTest
{
    /**
     * @test
     * @dataProvider provideModelData
     * @dataProvider provideElasticsearchReadData
     * @dataProvider provideDoctrineOrmReadData
     */
    public function outputClass(ImprovedClassSource $classSource, string $outputName): void
    {
        $generator = $this->getService(PhpParserGenerator::class);

        $this->assertSame($this->getFileContent($outputName), $generator->getOutput($classSource));
    }

    public function provideModelData(): array
    {
        $provider = new BroadwayModelDataProvider();

        return [
            [$provider->provideUuidIdentifier(), 'code/uuid-identifier'],
            [$provider->provideBroadwayCommand(), 'code/broadway-command'],
            [$provider->provideBroadwayEvent(), 'code/broadway-event'],
            [$provider->provideBroadwayModel(), 'code/broadway-model'],
            [$provider->provideBroadwayModelRepository(), 'code/broadway-model-repository'],
        ];
    }

    public function provideElasticsearchReadData(): array
    {
        $provider = new BroadwayElasticsearchReadDataProvider();

        return [
            [$provider->provideBroadwayElasticSearchReadEntity(), 'code/read/elasticsearch/entity'],
            [$provider->provideBroadwayElasticSearchReadRepository(), 'code/read/elasticsearch/repository'],
            [$provider->provideBroadwayElasticSearchReadProjector(), 'code/read/elasticsearch/projector'],
        ];
    }

    public function provideDoctrineOrmReadData(): array
    {
        $provider = new BroadwayDoctrineOrmReadDataProvider();

        return [
            [$provider->provideBroadwayDoctrineOrmReadEntity(), 'code/read/doctrine-orm/entity'],
            [$provider->provideBroadwayDoctrineOrmReadFactory(), 'code/read/doctrine-orm/factory'],
            [$provider->provideBroadwayDoctrineOrmReadRepository(), 'code/read/doctrine-orm/repository'],
            [$provider->provideBroadwayDoctrineOrmReadProjector(), 'code/read/doctrine-orm/projector'],
        ];
    }
}
