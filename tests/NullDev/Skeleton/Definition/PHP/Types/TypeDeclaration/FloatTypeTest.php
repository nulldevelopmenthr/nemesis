<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration;

use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\FloatType;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\FloatType
 * @group nemesis
 */
class FloatTypeTest extends PHPUnit_Framework_TestCase
{
    /** @var FloatType */
    private $floatType;

    public function setUp(): void
    {
        $this->floatType = new FloatType();
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
