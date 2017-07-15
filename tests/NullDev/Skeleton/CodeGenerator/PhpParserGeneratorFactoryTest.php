<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\CodeGenerator;

use NullDev\Skeleton\CodeGenerator\PhpParserGeneratorFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\CodeGenerator\PhpParserGeneratorFactory
 * @group nemesis
 */
class PhpParserGeneratorFactoryTest extends PHPUnit_Framework_TestCase
{
    /** @var PhpParserGeneratorFactory */
    private $phpParserGeneratorFactory;

    public function setUp(): void
    {
        $this->phpParserGeneratorFactory = new PhpParserGeneratorFactory();
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
