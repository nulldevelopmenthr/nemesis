<?php

namespace tests\NullDev\Nemesis\SourceParser;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Nemesis\SourceParser\ReflectionSourceParser;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Nemesis\SourceParser\ReflectionSourceParser
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
