<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration;

use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\IntType;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\IntType
 * @group nemesis
 */
class IntTypeTest extends PHPUnit_Framework_TestCase
{
    /** @var IntType */
    private $intType;

    public function setUp(): void
    {
        $this->intType = new IntType();
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
