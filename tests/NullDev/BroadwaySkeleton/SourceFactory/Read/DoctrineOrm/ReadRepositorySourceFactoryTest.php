<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm;

use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadRepositorySourceFactory;
use NullDev\Skeleton\Source\ClassSourceFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadRepositorySourceFactory
 * @group  nemesis
 */
class ReadRepositorySourceFactoryTest extends TestCase
{
    /** @var ReadRepositorySourceFactory */
    private $readRepositorySourceFactory;

    public function setUp(): void
    {
        $this->readRepositorySourceFactory = new ReadRepositorySourceFactory(
            new ClassSourceFactory(),
            new DefinitionFactory()
        );
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
