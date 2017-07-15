<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\CodeGenerator\PhpParser;

use NullDev\Skeleton\CodeGenerator\PhpParser\ClassGenerator;
use PhpParser\BuilderFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\CodeGenerator\PhpParser\ClassGenerator
 * @group nemesis
 */
class ClassGeneratorTest extends PHPUnit_Framework_TestCase
{
    /** @var ClassGenerator */
    private $classGenerator;

    public function setUp(): void
    {
        $this->classGenerator = new ClassGenerator(new BuilderFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
