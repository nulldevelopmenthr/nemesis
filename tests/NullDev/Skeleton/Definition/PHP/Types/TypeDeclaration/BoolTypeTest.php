<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration;

use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\BoolType;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\BoolType
 * @group nemesis
 */
class BoolTypeTest extends PHPUnit_Framework_TestCase
{
    /** @var BoolType */
    private $boolType;

    public function setUp(): void
    {
        $this->boolType = new BoolType();
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
