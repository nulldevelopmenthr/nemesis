<?php

declare(strict_types=1);

namespace tests\NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods\InitializableGenerator;
use PhpParser\BuilderFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods\InitializableGenerator
 * @group nemesis
 */
class InitializableGeneratorTest extends PHPUnit_Framework_TestCase
{
    /** @var InitializableGenerator */
    private $initializableGenerator;

    public function setUp(): void
    {
        $this->initializableGenerator = new InitializableGenerator(new BuilderFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
