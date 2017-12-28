<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration;

use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\FloatType;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\FloatType
 * @group  unit
 */
class FloatTypeTest extends TestCase
{
    /** @var FloatType */
    private $type;

    public function setUp(): void
    {
        $this->type = new FloatType();
    }

    public function testGetName(): void
    {
        self::assertEquals('float', $this->type->getName());
    }

    public function testGetFullName(): void
    {
        self::assertEquals('float', $this->type->getFullName());
    }
}
