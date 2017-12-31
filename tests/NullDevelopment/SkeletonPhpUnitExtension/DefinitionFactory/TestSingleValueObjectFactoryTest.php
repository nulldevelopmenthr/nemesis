<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestSingleValueObjectFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestSingleValueObjectFactory
 * @group  todo
 */
class TestSingleValueObjectFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var array */
    private $factories;

    /** @var TestSingleValueObjectFactory */
    private $sut;

    public function setUp()
    {
        $this->factories = [];
        $this->sut       = new TestSingleValueObjectFactory($this->factories);
    }

    public function testCreateFromSingleValueObject()
    {
        $this->markTestSkipped('Skipping');
    }
}
