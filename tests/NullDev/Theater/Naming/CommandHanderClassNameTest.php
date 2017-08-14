<?php

declare(strict_types=1);

namespace tests\NullDev\Theater\Naming;

use NullDev\Theater\Naming\CommandHanderClassName;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Theater\Naming\CommandHanderClassName
 * @group  unit
 */
class CommandHanderClassNameTest extends PHPUnit_Framework_TestCase
{
    /** @var string */
    private $name;
    /** @var string */
    private $namespace;
    /** @var CommandHanderClassName */
    private $className;

    public function setUp()
    {
        $this->name      = 'name';
        $this->namespace = 'namespace';
        $this->className = new CommandHanderClassName($this->name, $this->namespace);
    }

    public function testCreateFromFullyQualified()
    {
        self::assertEquals(
            $this->className,
            CommandHanderClassName::createFromFullyQualified($this->namespace.'\\'.$this->name)
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
