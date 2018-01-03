<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestUuidV4IdentifierFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestUuidV4IdentifierFactory
 * @group  todo
 */
class TestUuidV4IdentifierFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var array */
    private $factories;

    /** @var TestUuidV4IdentifierFactory */
    private $sut;

    public function setUp()
    {
        $this->factories = [];
        $this->sut       = new TestUuidV4IdentifierFactory($this->factories);
    }

    public function testCreateFromUuidV4Identifier()
    {
        $this->markTestSkipped('Skipping');
    }
}
