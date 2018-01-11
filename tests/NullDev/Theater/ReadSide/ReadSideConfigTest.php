<?php

declare(strict_types=1);

namespace Tests\NullDev\Theater\ReadSide;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\Theater\ReadSide\ReadSideConfig;
use NullDev\Theater\ReadSide\ReadSideImplementation;
use NullDev\Theater\ReadSide\ReadSideName;
use NullDev\Theater\ReadSide\ReadSideNamespace;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Theater\ReadSide\ReadSideConfig
 * @group  todo
 */
class ReadSideConfigTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|ReadSideName */
    private $name;

    /** @var MockInterface|ReadSideNamespace */
    private $namespace;

    /** @var MockInterface|ReadSideImplementation */
    private $implementation;

    /** @var MockInterface|ClassName */
    private $readEntity;

    /** @var MockInterface|ClassName */
    private $readRepository;

    /** @var MockInterface|ClassName */
    private $readProjector;

    /** @var MockInterface|ClassName */
    private $readFactory;

    /** @var array */
    private $properties;

    /** @var ReadSideConfig */
    private $sut;

    public function setUp()
    {
        $this->name           = Mockery::mock(ReadSideName::class);
        $this->namespace      = Mockery::mock(ReadSideNamespace::class);
        $this->implementation = Mockery::mock(ReadSideImplementation::class);
        $this->readEntity     = Mockery::mock(ClassName::class);
        $this->readRepository = Mockery::mock(ClassName::class);
        $this->readProjector  = Mockery::mock(ClassName::class);
        $this->readFactory    = Mockery::mock(ClassName::class);
        $this->properties     = [];
        $this->sut            = new ReadSideConfig(
            $this->name,
            $this->namespace,
            $this->implementation,
            $this->readEntity,
            $this->readRepository,
            $this->readProjector,
            $this->readFactory,
            $this->properties
        );
    }

    public function testGetName()
    {
        self::assertEquals($this->name, $this->sut->getName());
    }

    public function testGetNamespace()
    {
        self::assertEquals($this->namespace, $this->sut->getNamespace());
    }

    public function testGetImplementation()
    {
        self::assertEquals($this->implementation, $this->sut->getImplementation());
    }

    public function testGetReadEntity()
    {
        self::assertEquals($this->readEntity, $this->sut->getReadEntity());
    }

    public function testGetReadRepository()
    {
        self::assertEquals($this->readRepository, $this->sut->getReadRepository());
    }

    public function testGetReadProjector()
    {
        self::assertEquals($this->readProjector, $this->sut->getReadProjector());
    }

    public function testGetReadFactory()
    {
        self::assertEquals($this->readFactory, $this->sut->getReadFactory());
    }

    public function testGetProperties()
    {
        self::assertEquals($this->properties, $this->sut->getProperties());
    }

    public function testToArray()
    {
        $this->markTestSkipped('Skipping');
    }
}
