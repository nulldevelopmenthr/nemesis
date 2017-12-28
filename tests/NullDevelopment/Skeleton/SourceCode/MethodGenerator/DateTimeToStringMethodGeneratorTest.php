<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\MethodGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator\DateTimeToStringMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\NullDev\AssertOutputTrait;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\MethodGenerator\DateTimeToStringMethodGenerator
 * @group  todo
 */
class DateTimeToStringMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait;
    /** @var DateTimeToStringMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new DateTimeToStringMethodGenerator();
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
