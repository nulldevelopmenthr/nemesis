<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpUnitExtension\MethodFactory\TestDeserializeMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\MethodFactory\TestDeserializeMethodFactory
 * @group  todo
 */
class TestDeserializeMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var TestDeserializeMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new TestDeserializeMethodFactory();
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateFromDeserializeMethod()
    {
        $this->markTestSkipped('Skipping');
    }
}
