<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Broadway\SourceFactory\Read\DoctrineOrm;

use NullDev\Skeleton\Broadway\SourceFactory\Read\DoctrineOrm\ReadFactorySourceFactory;
use NullDev\Skeleton\Definition\PHP\DefinitionFactory;
use NullDev\Skeleton\Source\ClassSourceFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Broadway\SourceFactory\Read\DoctrineOrm\ReadFactorySourceFactory
 * @group nemesis
 */
class ReadFactorySourceFactoryTest extends PHPUnit_Framework_TestCase
{
    /** @var ReadFactorySourceFactory */
    private $readFactorySourceFactory;

    public function setUp(): void
    {
        $this->readFactorySourceFactory = new ReadFactorySourceFactory(new ClassSourceFactory(), new DefinitionFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
