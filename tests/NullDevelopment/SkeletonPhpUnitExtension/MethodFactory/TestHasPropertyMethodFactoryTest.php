<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpUnitExtension\MethodFactory\TestHasPropertyMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\MethodFactory\TestHasPropertyMethodFactory
 * @group  todo
 */
class TestHasPropertyMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var TestHasPropertyMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new TestHasPropertyMethodFactory();
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateFromHasPropertyMethod()
    {
        $this->markTestSkipped('Skipping');
    }
}
