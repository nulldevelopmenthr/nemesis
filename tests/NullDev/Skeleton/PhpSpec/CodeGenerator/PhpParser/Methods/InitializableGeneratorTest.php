<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\PhpSpec\CodeGenerator\PhpParser\Methods;

use NullDev\Skeleton\PhpSpec\CodeGenerator\PhpParser\Methods\InitializableGenerator;
use PhpParser\BuilderFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\PhpSpec\CodeGenerator\PhpParser\Methods\InitializableGenerator
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
