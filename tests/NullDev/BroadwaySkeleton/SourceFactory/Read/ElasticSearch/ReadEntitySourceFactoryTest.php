<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch;

use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch\ReadEntitySourceFactory;
use NullDev\Skeleton\Source\ClassSourceFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch\ReadEntitySourceFactory
 * @group  nemesis
 */
class ReadEntitySourceFactoryTest extends TestCase
{
    /** @var ReadEntitySourceFactory */
    private $readEntitySourceFactory;

    public function setUp(): void
    {
        $this->readEntitySourceFactory = new ReadEntitySourceFactory(new ClassSourceFactory(), new DefinitionFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
