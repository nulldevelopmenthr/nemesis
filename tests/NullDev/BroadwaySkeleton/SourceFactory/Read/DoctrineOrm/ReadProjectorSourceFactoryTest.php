<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm;

use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadProjectorSourceFactory;
use NullDev\Skeleton\Source\ClassSourceFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadProjectorSourceFactory
 * @group  nemesis
 */
class ReadProjectorSourceFactoryTest extends TestCase
{
    /** @var ReadProjectorSourceFactory */
    private $readProjectorSourceFactory;

    public function setUp(): void
    {
        $this->readProjectorSourceFactory = new ReadProjectorSourceFactory(
            new ClassSourceFactory(), new DefinitionFactory()
        );
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
