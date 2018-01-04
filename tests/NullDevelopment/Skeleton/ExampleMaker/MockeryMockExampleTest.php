<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\ExampleMaker;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\PhpStructure\DataTypeName\ContractName;
use NullDevelopment\Skeleton\ExampleMaker\MockeryMockExample;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\ExampleMaker\MockeryMockExample
 * @group  todo
 */
class MockeryMockExampleTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|ContractName */
    private $instanceOf;

    /** @var MockeryMockExample */
    private $sut;

    public function setUp()
    {
        $this->instanceOf = Mockery::mock(ContractName::class);
        $this->sut        = new MockeryMockExample($this->instanceOf);
    }

    public function testToString()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testClassesToImport()
    {
        $this->markTestSkipped('Skipping');
    }
}
