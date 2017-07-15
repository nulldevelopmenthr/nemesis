<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\CodeGenerator\PhpParser;

use NullDev\Skeleton\CodeGenerator\PhpParser\MethodFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\CodeGenerator\PhpParser\MethodFactory
 * @group nemesis
 */
class MethodFactoryTest extends PHPUnit_Framework_TestCase
{
    /** @var MethodFactory */
    private $methodFactory;

    public function setUp(): void
    {
        $this->methodFactory = new MethodFactory([]);
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
