<?php

declare(strict_types=1);

namespace Tests\NullDev\Theater\ReadSide;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Theater\ReadSide\ReadSideNamespace;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Theater\ReadSide\ReadSideNamespace
 * @group  todo
 */
class ReadSideNamespaceTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $namespace;
    /** @var ReadSideNamespace */
    private $sut;

    public function setUp()
    {
        $this->namespace = 'namespace';
        $this->sut       = new ReadSideNamespace($this->namespace);
    }

    public function testGetValue()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testToString()
    {
        $this->markTestSkipped('Skipping');
    }
}
