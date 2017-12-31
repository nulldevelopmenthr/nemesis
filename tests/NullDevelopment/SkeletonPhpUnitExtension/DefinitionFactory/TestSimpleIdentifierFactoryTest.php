<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestSimpleIdentifierFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestSimpleIdentifierFactory
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
