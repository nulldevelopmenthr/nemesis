<?php

namespace tests\NullDev\Skeleton\Suggestions;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\Skeleton\Path\Readers\SourceCodePathReader;
use NullDev\Skeleton\Suggestions\NamespaceSuggestions;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\Suggestions\NamespaceSuggestions
 * @group  todo
 */
class NamespaceSuggestionsTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|SourceCodePathReader */
    private $pathReader;
    /** @var NamespaceSuggestions */
    private $sut;

    public function setUp()
    {
        $this->pathReader = Mockery::mock(SourceCodePathReader::class);
        $this->sut        = new NamespaceSuggestions($this->pathReader);
    }

    public function testSuggest()
    {
        $this->markTestSkipped('Skipping');
    }
}
