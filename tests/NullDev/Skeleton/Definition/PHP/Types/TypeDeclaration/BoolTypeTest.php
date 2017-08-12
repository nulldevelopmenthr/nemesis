<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration;

use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\BoolType;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\BoolType
 * @group  unit
 */
class BoolTypeTest extends PHPUnit_Framework_TestCase
{
    /** @var BoolType */
    private $type;

    public function setUp(): void
    {
        $this->type = new BoolType();
    }

    public function testGetName(): void
    {
        self::assertEquals('bool', $this->type->getName());
    }

    public function testGetFullName(): void
    {
        self::assertEquals('bool', $this->type->getFullName());
    }
}
