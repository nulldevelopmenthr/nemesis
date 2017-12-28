<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\DefinitionFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestSimpleEntityFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestSimpleEntityFactory
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
