<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration;

use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\IntType;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\IntType
 * @group  unit
 */
class IntTypeTest extends PHPUnit_Framework_TestCase
{
    /** @var IntType */
    private $type;

    public function setUp(): void
    {
        $this->type = new IntType();
    }

    public function testGetName(): void
    {
        self::assertEquals('int', $this->type->getName());
    }

    public function testGetFullName(): void
    {
        self::assertEquals('int', $this->type->getFullName());
    }
}
