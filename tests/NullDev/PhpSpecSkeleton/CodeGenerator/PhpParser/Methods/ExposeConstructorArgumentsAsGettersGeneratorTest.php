<?php

declare(strict_types=1);

namespace tests\NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods\ExposeConstructorArgumentsAsGettersGenerator;
use PhpParser\BuilderFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods\ExposeConstructorArgumentsAsGettersGenerator
 * @group nemesis
 */
class ExposeConstructorArgumentsAsGettersGeneratorTest extends PHPUnit_Framework_TestCase
{
    /** @var ExposeConstructorArgumentsAsGettersGenerator */
    private $exposeConstructorArgumentsAsGettersGenerator;

    public function setUp(): void
    {
        $this->exposeConstructorArgumentsAsGettersGenerator = new ExposeConstructorArgumentsAsGettersGenerator(new BuilderFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
