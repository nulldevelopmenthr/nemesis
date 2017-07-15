<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\CodeGenerator\PhpParser\Methods;

use NullDev\Skeleton\CodeGenerator\PhpParser\Methods\UuidCreateGenerator;
use PhpParser\BuilderFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\CodeGenerator\PhpParser\Methods\UuidCreateGenerator
 * @group nemesis
 */
class UuidCreateGeneratorTest extends PHPUnit_Framework_TestCase
{
    /** @var UuidCreateGenerator */
    private $uuidCreateGenerator;

    public function setUp(): void
    {
        $this->uuidCreateGenerator = new UuidCreateGenerator(new BuilderFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
