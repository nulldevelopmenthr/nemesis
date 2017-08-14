<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Suggestions;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Skeleton\Path\Readers\SourceCodePathReader;
use NullDev\Skeleton\Suggestions\ClassSuggestions;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Suggestions\ClassSuggestions
 * @group  todo
 */
class ClassSuggestionsTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var \Mockery\MockInterface|SourceCodePathReader */
    private $pathReader;
    /** @var ClassSuggestions */
    private $classSuggestions;

    public function setUp()
    {
        $this->pathReader       = Mockery::mock(SourceCodePathReader::class);
        $this->classSuggestions = new ClassSuggestions($this->pathReader);
    }

    public function testSuggest()
    {
        $this->markTestSkipped('Skipping');
    }
}
