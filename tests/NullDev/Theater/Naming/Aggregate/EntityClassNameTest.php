<?php

declare(strict_types=1);

namespace Tests\NullDev\Theater\Naming\Aggregate;

use NullDev\Theater\Naming\Aggregate\EntityClassName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Theater\Naming\Aggregate\EntityClassName
 * @group  unit
 */
class EntityClassNameTest extends TestCase
{
    /** @var string */
    private $name;

    /** @var string */
    private $namespace;

    /** @var EntityClassName */
    private $className;

    public function setUp()
    {
        $this->name      = 'name';
        $this->namespace = 'namespace';
        $this->className = new EntityClassName($this->name, $this->namespace);
    }

    public function testCreateFromFullyQualified()
    {
        self::assertEquals(
            $this->className, EntityClassName::createFromFullyQualified($this->namespace.'\\'.$this->name)
        );
    }

    public function testHasNamespace()
    {
        self::assertTrue($this->className->hasNamespace());
    }

    public function testGetNamespace()
    {
        self::assertEquals($this->namespace, $this->className->getNamespace());
    }

    public function testGetName()
    {
        self::assertEquals($this->name, $this->className->getName());
    }

    public function testGetFullName()
    {
        self::assertEquals($this->namespace.'\\'.$this->name, $this->className->getFullName());
    }
}
