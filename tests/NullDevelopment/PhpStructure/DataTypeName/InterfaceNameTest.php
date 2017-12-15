<?php

namespace tests\NullDevelopment\PhpStructure\DataTypeName;

use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\PhpStructure\DataTypeName\InterfaceName
 * @group  unit
 */
class InterfaceNameTest extends TestCase
{
    /** @var string */
    private $name;
    /** @var string */
    private $namespace;
    /** @var InterfaceName */
    private $sut;

    public function setUp()
    {
        $this->name      = 'name';
        $this->namespace = 'namespace';
        $this->sut       = new InterfaceName($this->name, $this->namespace);
    }

    public function testGetName()
    {
        self::assertEquals($this->name, $this->sut->getName());
    }

    public function testGetNamespace()
    {
        self::assertEquals($this->namespace, $this->sut->getNamespace());
    }

    public function testGetFullName()
    {
        self::assertEquals($this->namespace.'\\'.$this->name, $this->sut->getFullName());
    }

    public function testCreateFromFullyQualified()
    {
        self::assertEquals(
            $this->sut,
            InterfaceName::createFromFullyQualified($this->namespace.'\\'.$this->name)
        );
    }
}
