<?php

declare(strict_types=1);

namespace tests\NullDev\Nemesis\SourceParser;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Nemesis\SourceParser\PhpParserSourceParser;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Nemesis\SourceParser\PhpParserSourceParser
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
