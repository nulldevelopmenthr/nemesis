<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration;

use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\StringType;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\StringType
 * @group  unit
 */
class StringTypeTest extends TestCase
{
    /** @var StringType */
    private $type;

    public function setUp(): void
    {
        $this->type = new StringType();
    }

    public function testGetName(): void
    {
        self::assertEquals('string', $this->type->getName());
    }

    public function testGetFullName(): void
    {
        self::assertEquals('string', $this->type->getFullName());
    }
}
