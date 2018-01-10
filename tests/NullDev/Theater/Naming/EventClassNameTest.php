<?php

declare(strict_types=1);

namespace Tests\NullDev\Theater\Naming;

use NullDev\Theater\Naming\EventClassName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Theater\Naming\EventClassName
 * @group  unit
 */
class EventClassNameTest extends TestCase
{
    /** @var string */
    private $name;

    /** @var string */
    private $namespace;

    /** @var EventClassName */
    private $className;

    public function setUp()
    {
        $this->name      = 'WebshopCreated';
        $this->namespace = 'MyCompany\Webshop\Domain\Event';
        $this->className = new EventClassName($this->name, $this->namespace);
    }

    public function testCreateFromFullyQualified()
    {
        self::assertEquals(
            $this->className, EventClassName::createFromFullyQualified($this->namespace.'\\'.$this->name)
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
