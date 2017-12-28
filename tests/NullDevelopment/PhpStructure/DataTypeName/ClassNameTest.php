<?php

declare(strict_types=1);

namespace tests\NullDevelopment\PhpStructure\DataTypeName;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\PhpStructure\DataTypeName\ClassName
 * @group  unit
 */
class ClassNameTest extends TestCase
{
    /** @var string */
    private $name;
    /** @var string */
    private $namespace;
    /** @var ClassName */
    private $sut;

    public function setUp()
    {
        $this->name      = 'name';
        $this->namespace = 'namespace';
        $this->sut       = new ClassName($this->name, $this->namespace);
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
            ClassName::createFromFullyQualified($this->namespace.'\\'.$this->name)
        );
    }
}
