<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP\Types;

use NullDev\Skeleton\Definition\PHP\Types\TraitType;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Types\TraitType
 * @group nemesis
 */
class TraitTypeTest extends PHPUnit_Framework_TestCase
{
    /** @var TraitType */
    private $traitType;

    public function setUp(): void
    {
        $this->traitType = new TraitType('name', 'namespace');
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
