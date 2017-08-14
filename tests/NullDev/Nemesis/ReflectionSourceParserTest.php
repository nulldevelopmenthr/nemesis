<?php

declare(strict_types=1);

namespace tests\NullDev\Nemesis;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Nemesis\ReflectionSourceParser;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Nemesis\ReflectionSourceParser
 * @group  todo
 */
class ReflectionSourceParserTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var ReflectionSourceParser */
    private $reflectionSourceParser;

    public function setUp()
    {
        $this->reflectionSourceParser = new ReflectionSourceParser();
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
