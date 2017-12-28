<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\MethodCollectionFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\MethodCollectionFactory
 * @group  todo
 */
class MethodCollectionFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MethodCollectionFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new MethodCollectionFactory();
    }

    public function testNothing()
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
