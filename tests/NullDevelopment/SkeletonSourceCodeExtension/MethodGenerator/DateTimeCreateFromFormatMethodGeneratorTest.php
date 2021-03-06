<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\DateTimeCreateFromFormatMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\NullDev\AssertOutputTrait;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\DateTimeCreateFromFormatMethodGenerator
 * @group  todo
 */
class DateTimeCreateFromFormatMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait;

    /** @var DateTimeCreateFromFormatMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new DateTimeCreateFromFormatMethodGenerator();
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
