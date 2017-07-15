<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\CodeGenerator\PhpParser\Methods;

use NullDev\Skeleton\CodeGenerator\PhpParser\Methods\DeserializeGenerator;
use PhpParser\BuilderFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\CodeGenerator\PhpParser\Methods\DeserializeGenerator
 * @group nemesis
 */
class DeserializeGeneratorTest extends PHPUnit_Framework_TestCase
{
    /** @var DeserializeGenerator */
    private $deserializeGenerator;

    public function setUp(): void
    {
        $this->deserializeGenerator = new DeserializeGenerator(new BuilderFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
