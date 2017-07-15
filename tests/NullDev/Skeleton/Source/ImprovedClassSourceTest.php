<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Source;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Source\ImprovedClassSource
 * @group nemesis
 */
class ImprovedClassSourceTest extends PHPUnit_Framework_TestCase
{
    /** @var ImprovedClassSource */
    private $improvedClassSource;

    public function setUp(): void
    {
        $this->improvedClassSource = new ImprovedClassSource(new ClassType('name', 'namespace'));
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
