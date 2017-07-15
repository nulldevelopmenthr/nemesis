<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration;

use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\StringType;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\StringType
 * @group nemesis
 */
class StringTypeTest extends PHPUnit_Framework_TestCase
{
    /** @var StringType */
    private $stringType;

    public function setUp(): void
    {
        $this->stringType = new StringType();
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
