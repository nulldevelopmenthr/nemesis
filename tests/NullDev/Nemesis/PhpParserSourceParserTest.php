<?php

declare(strict_types=1);

namespace tests\NullDev\Nemesis;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Nemesis\PhpParserSourceParser;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Nemesis\PhpParserSourceParser
 * @group  todo
 */
class PhpParserSourceParserTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var PhpParserSourceParser */
    private $phpParserSourceParser;

    public function setUp()
    {
        $this->phpParserSourceParser = new PhpParserSourceParser();
    }

    public function testParse()
    {
        $this->markTestSkipped('Skipping');
    }
}
