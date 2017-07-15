<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\CodeGenerator\PhpParser\Methods;

use NullDev\Skeleton\CodeGenerator\PhpParser\Methods\ConstructorGenerator;
use PhpParser\BuilderFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\CodeGenerator\PhpParser\Methods\ConstructorGenerator
 * @group nemesis
 */
class ConstructorGeneratorTest extends PHPUnit_Framework_TestCase
{
    /** @var ConstructorGenerator */
    private $constructorGenerator;

    public function setUp(): void
    {
        $this->constructorGenerator = new ConstructorGenerator(new BuilderFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
