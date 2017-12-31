<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\SpecDateTimeCreateFromFormatMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\SpecDateTimeCreateFromFormatMethodFactory
 * @group  todo
 */
class SpecDateTimeCreateFromFormatMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var SpecDateTimeCreateFromFormatMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new SpecDateTimeCreateFromFormatMethodFactory();
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateFromDateTimeCreateFromFormatMethod()
    {
        $this->markTestSkipped('Skipping');
    }
}
