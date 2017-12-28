<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\DefinitionFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestSimpleIdentifierFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestSimpleIdentifierFactory
 * @group  todo
 */
class TestSimpleIdentifierFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var array */
    private $factories;
    /** @var TestSimpleIdentifierFactory */
    private $sut;

    public function setUp()
    {
        $this->factories = [];
        $this->sut       = new TestSimpleIdentifierFactory($this->factories);
    }

    public function testCreateFromSimpleIdentifier()
    {
        $this->markTestSkipped('Skipping');
    }
}
