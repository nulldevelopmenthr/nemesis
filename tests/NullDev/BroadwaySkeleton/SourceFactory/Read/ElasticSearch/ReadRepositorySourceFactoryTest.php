<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch;

use NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch\ReadRepositorySourceFactory;
use NullDev\Skeleton\Definition\PHP\DefinitionFactory;
use NullDev\Skeleton\Source\ClassSourceFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch\ReadRepositorySourceFactory
 * @group  nemesis
 */
class ReadRepositorySourceFactoryTest extends PHPUnit_Framework_TestCase
{
    /** @var ReadRepositorySourceFactory */
    private $readRepositorySourceFactory;

    public function setUp(): void
    {
        $this->readRepositorySourceFactory = new ReadRepositorySourceFactory(new ClassSourceFactory(), new DefinitionFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
