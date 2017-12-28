<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\MethodGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\PhpSpec\MethodGenerator\SpecDateTimeCreateFromFormatMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\NullDev\AssertOutputTrait;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\MethodGenerator\SpecDateTimeCreateFromFormatMethodGenerator
 * @group  todo
 */
class SpecDateTimeCreateFromFormatMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait;
    /** @var SpecDateTimeCreateFromFormatMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new SpecDateTimeCreateFromFormatMethodGenerator();
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
