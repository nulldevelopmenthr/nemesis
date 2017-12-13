<?php

namespace tests\NullDev\Nemesis;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Nemesis\PhpParserSourceParser;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Nemesis\PhpParserSourceParser
 * @group  todo
 */
class PhpParserSourceParserTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var PhpParserSourceParser */
    private $sut;

    public function setUp()
    {
        $this->sut = new PhpParserSourceParser();
    }

    public function testParse()
    {
        $this->markTestSkipped('Skipping');
    }
}
