<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\PhpStructure\DataTypeName;

use NullDevelopment\PhpStructure\DataTypeName\TraitName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\PhpStructure\DataTypeName\TraitName
 * @group  unit
 */
class TraitNameTest extends TestCase
{
    /** @var string */
    private $name;

    /** @var string */
    private $namespace;

    /** @var TraitName */
    private $sut;

    public function setUp()
    {
        $this->name      = 'name';
        $this->namespace = 'namespace';
        $this->sut       = new TraitName($this->name, $this->namespace);
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
        self::assertEquals($this->sut, TraitName::createFromFullyQualified($this->namespace.'\\'.$this->name));
    }
}
