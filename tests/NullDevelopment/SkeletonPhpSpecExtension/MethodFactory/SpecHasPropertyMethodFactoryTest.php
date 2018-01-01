<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\SpecHasPropertyMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\SpecHasPropertyMethodFactory
 * @group todo
 */
class SpecHasPropertyMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var SpecHasPropertyMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new SpecHasPropertyMethodFactory();
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
