<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\SourceFactory;

use Mockery;
use NullDev\Skeleton\Definition\PHP\DefinitionFactory;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\SourceFactory\UuidIdentitySourceFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\SourceFactory\UuidIdentitySourceFactory
 * @group  nemesis
 */
class UuidIdentitySourceFactoryTest extends PHPUnit_Framework_TestCase
{
    /** @var UuidIdentitySourceFactory */
    private $uuidIdentitySourceFactory;

    public function setUp(): void
    {
        $this->uuidIdentitySourceFactory = new UuidIdentitySourceFactory(
            Mockery::mock(ClassSourceFactory::class), Mockery::mock(DefinitionFactory::class)
        );
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
