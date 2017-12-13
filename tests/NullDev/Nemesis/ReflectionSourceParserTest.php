<?php

namespace tests\NullDev\Nemesis;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Nemesis\ReflectionSourceParser;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Nemesis\ReflectionSourceParser
 * @group  todo
 */
class ReflectionSourceParserTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var ReflectionSourceParser */
    private $sut;

    public function setUp()
    {
        $this->sut = new ReflectionSourceParser();
    }

    public function testParse()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testParseClass()
    {
        $this->markTestSkipped('Skipping');
    }
}
