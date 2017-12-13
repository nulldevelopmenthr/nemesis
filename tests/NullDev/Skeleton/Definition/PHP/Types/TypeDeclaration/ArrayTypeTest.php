<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration;

use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\ArrayType;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\ArrayType
 * @group  unit
 */
class ArrayTypeTest extends TestCase
{
    /** @var ArrayType */
    private $type;

    public function setUp(): void
    {
        $this->type = new ArrayType();
    }

    public function testGetName(): void
    {
        self::assertEquals('array', $this->type->getName());
    }

    public function testGetFullName(): void
    {
        self::assertEquals('array', $this->type->getFullName());
    }
}
