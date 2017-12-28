<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\CodeGenerator;

use NullDev\PhpSpecSkeleton\SpecGenerator;
use NullDev\Skeleton\Source\ImprovedClassSource;
use Tests\NullDev\AssertOutputTrait;

/**
 * @group  FullCoverage
 * @coversNothing
 */
class BroadwaySpecGeneratorTest extends BaseCodeGeneratorTest
{
    use AssertOutputTrait;

    /**
     * @test
     * @dataProvider provideModelData
     * @dataProvider provideElasticsearchReadData
     * @dataProvider provideDoctrineOrmReadData
     */
    public function outputClass(ImprovedClassSource $classSource, string $outputName): void
    {
        $specGenerator = $this->getService(SpecGenerator::class);

        $this->assertClassSourceOutputMatches($this->getFileName($outputName), $specGenerator->generate($classSource));
    }

    public function provideModelData(): array
    {
        $provider = new BroadwayModelDataProvider();

        return [
            [$provider->provideUuidIdentifier(), 'spec/uuid-identifier-spec'],
            [$provider->provideBroadwayCommand(), 'spec/broadway-command-spec'],
            [$provider->provideBroadwayEvent(), 'spec/broadway-event-spec'],
            [$provider->provideBroadwayModel(), 'spec/broadway-model-spec'],
            [$provider->provideBroadwayModelRepository(), 'spec/broadway-model-repository-spec'],
        ];
    }

    public function provideElasticsearchReadData(): array
    {
        $provider = new BroadwayElasticsearchReadDataProvider();

        return [
            [$provider->provideBroadwayElasticSearchReadEntity(), 'spec/read/elasticsearch/entity-spec'],
            [$provider->provideBroadwayElasticSearchReadRepository(), 'spec/read/elasticsearch/repository-spec'],
            [$provider->provideBroadwayElasticSearchReadProjector(), 'spec/read/elasticsearch/projector-spec'],
        ];
    }

    public function provideDoctrineOrmReadData(): array
    {
        $provider = new BroadwayDoctrineOrmReadDataProvider();

        return [
            [$provider->provideBroadwayDoctrineOrmReadEntity(), 'spec/read/doctrine-orm/entity-spec'],
            [$provider->provideBroadwayDoctrineOrmReadFactory(), 'spec/read/doctrine-orm/factory-spec'],
            [$provider->provideBroadwayDoctrineOrmReadRepository(), 'spec/read/doctrine-orm/repository-spec'],
            [$provider->provideBroadwayDoctrineOrmReadProjector(), 'spec/read/doctrine-orm/projector-spec'],
        ];
    }
}
