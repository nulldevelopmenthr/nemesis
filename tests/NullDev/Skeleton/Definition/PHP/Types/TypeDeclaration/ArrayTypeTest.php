<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration;

use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\ArrayType;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\ArrayType
 * @group nemesis
 */
class ArrayTypeTest extends PHPUnit_Framework_TestCase
{
    /** @var ArrayType */
    private $arrayType;

    public function setUp(): void
    {
        $this->arrayType = new ArrayType();
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
