<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\CodeGenerator\PhpParser\Methods;

use NullDev\Skeleton\CodeGenerator\PhpParser\Methods\ToStringGenerator;
use PhpParser\BuilderFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\CodeGenerator\PhpParser\Methods\ToStringGenerator
 * @group nemesis
 */
class ToStringGeneratorTest extends PHPUnit_Framework_TestCase
{
    /** @var ToStringGenerator */
    private $toStringGenerator;

    public function setUp(): void
    {
        $this->toStringGenerator = new ToStringGenerator(new BuilderFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
