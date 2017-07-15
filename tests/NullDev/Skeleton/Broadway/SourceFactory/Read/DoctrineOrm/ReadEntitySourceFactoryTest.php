<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Broadway\SourceFactory\Read\DoctrineOrm;

use NullDev\Skeleton\Broadway\SourceFactory\Read\DoctrineOrm\ReadEntitySourceFactory;
use NullDev\Skeleton\Definition\PHP\DefinitionFactory;
use NullDev\Skeleton\Source\ClassSourceFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Broadway\SourceFactory\Read\DoctrineOrm\ReadEntitySourceFactory
 * @group nemesis
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
