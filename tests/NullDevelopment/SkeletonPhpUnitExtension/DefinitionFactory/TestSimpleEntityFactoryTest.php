<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestSimpleEntityFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestSimpleEntityFactory
 * @group  todo
 */
class TestSimpleEntityFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var array */
    private $factories;

    /** @var TestSimpleEntityFactory */
    private $sut;

    public function setUp()
    {
        $this->factories = [];
        $this->sut       = new TestSimpleEntityFactory($this->factories);
    }

    public function testCreateFromSimpleEntity()
    {
        $this->markTestSkipped('Skipping');
    }
}
