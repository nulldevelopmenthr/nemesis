<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpUnitExtension\MethodFactory\SetUpMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\MethodFactory\SetUpMethodFactory
 * @group  todo
 */
class SetUpMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var SetUpMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new SetUpMethodFactory();
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateFromConstructorMethod()
    {
        $this->markTestSkipped('Skipping');
    }
}
