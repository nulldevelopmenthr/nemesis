<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm;

use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadEntitySourceFactory;
use NullDev\Skeleton\Source\ClassSourceFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadEntitySourceFactory
 * @group  nemesis
 */
class ReadEntitySourceFactoryTest extends PHPUnit_Framework_TestCase
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
