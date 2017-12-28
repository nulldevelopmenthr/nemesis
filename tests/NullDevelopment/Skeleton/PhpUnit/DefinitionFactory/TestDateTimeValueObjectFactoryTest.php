<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\DefinitionFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestDateTimeValueObjectFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestDateTimeValueObjectFactory
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
