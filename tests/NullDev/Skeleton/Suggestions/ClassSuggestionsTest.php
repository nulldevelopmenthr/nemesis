<?php

namespace tests\NullDev\Skeleton\Suggestions;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\Skeleton\Path\Readers\SourceCodePathReader;
use NullDev\Skeleton\Suggestions\ClassSuggestions;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\Suggestions\ClassSuggestions
 * @group  todo
 */
class ClassSuggestionsTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|SourceCodePathReader */
    private $pathReader;
    /** @var ClassSuggestions */
    private $sut;

    public function setUp()
    {
        $this->pathReader = Mockery::mock(SourceCodePathReader::class);
        $this->sut        = new ClassSuggestions($this->pathReader);
    }

    public function testSuggest()
    {
        $this->markTestSkipped('Skipping');
    }
}
