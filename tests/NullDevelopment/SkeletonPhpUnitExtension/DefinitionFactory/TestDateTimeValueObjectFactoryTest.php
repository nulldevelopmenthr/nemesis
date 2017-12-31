<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestDateTimeValueObjectFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestDateTimeValueObjectFactory
 * @group  todo
 */
class TestDateTimeValueObjectFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var array */
    private $factories;

    /** @var TestDateTimeValueObjectFactory */
    private $sut;

    public function setUp()
    {
        $this->factories = [];
        $this->sut       = new TestDateTimeValueObjectFactory($this->factories);
    }

    public function testCreateFromDateTimeValueObject()
    {
        $this->markTestSkipped('Skipping');
    }
}
