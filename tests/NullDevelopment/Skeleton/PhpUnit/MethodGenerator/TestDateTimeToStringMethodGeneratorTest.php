<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\MethodGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\PhpUnit\MethodGenerator\TestDateTimeToStringMethodGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\MethodGenerator\TestDateTimeToStringMethodGenerator
 * @group  todo
 */
class TestDateTimeToStringMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var ExampleMaker */
    private $exampleMaker;
    /** @var TestDateTimeToStringMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->exampleMaker = new ExampleMaker();
        $this->sut          = new TestDateTimeToStringMethodGenerator($this->exampleMaker);
    }

    public function testSupports()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGenerateAsString()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGenerate()
    {
        $this->markTestSkipped('Skipping');
    }
}
