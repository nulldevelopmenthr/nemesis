<?php

declare(strict_types=1);

namespace tests\NullDev\Theater\Naming\Aggregate;

use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Theater\Naming\Aggregate\RootRepositoryClassName
 * @group  unit
 */
class RootRepositoryClassNameTest extends TestCase
{
    /** @var string */
    private $name;
    /** @var string */
    private $namespace;
    /** @var RootRepositoryClassName */
    private $className;

    public function setUp()
    {
        $this->name      = 'name';
        $this->namespace = 'namespace';
        $this->className = new RootRepositoryClassName($this->name, $this->namespace);
    }

    public function testCreateFromFullyQualified()
    {
        self::assertEquals(
            $this->className,
            RootRepositoryClassName::createFromFullyQualified($this->namespace.'\\'.$this->name)
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
