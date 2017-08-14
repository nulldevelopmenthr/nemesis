<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Suggestions;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Skeleton\Path\Readers\SourceCodePathReader;
use NullDev\Skeleton\Suggestions\NamespaceSuggestions;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Suggestions\NamespaceSuggestions
 * @group  todo
 */
class NamespaceSuggestionsTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var \Mockery\MockInterface|SourceCodePathReader */
    private $pathReader;
    /** @var NamespaceSuggestions */
    private $namespaceSuggestions;

    public function setUp()
    {
        $this->pathReader           = Mockery::mock(SourceCodePathReader::class);
        $this->namespaceSuggestions = new NamespaceSuggestions($this->pathReader);
    }

    public function testSuggest()
    {
        $this->markTestSkipped('Skipping');
    }
}
