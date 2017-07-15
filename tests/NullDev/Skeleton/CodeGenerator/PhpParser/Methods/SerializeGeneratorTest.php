<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\CodeGenerator\PhpParser\Methods;

use NullDev\Skeleton\CodeGenerator\PhpParser\Methods\SerializeGenerator;
use PhpParser\BuilderFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\CodeGenerator\PhpParser\Methods\SerializeGenerator
 * @group nemesis
 */
class SerializeGeneratorTest extends PHPUnit_Framework_TestCase
{
    /** @var SerializeGenerator */
    private $serializeGenerator;

    public function setUp(): void
    {
        $this->serializeGenerator = new SerializeGenerator(new BuilderFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
