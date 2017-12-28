<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\DefinitionFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestSingleValueObjectFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestSingleValueObjectFactory
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
