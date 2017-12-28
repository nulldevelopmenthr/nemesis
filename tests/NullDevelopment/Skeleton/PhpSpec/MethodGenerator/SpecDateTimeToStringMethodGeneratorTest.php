<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\MethodGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\PhpSpec\MethodGenerator\SpecDateTimeToStringMethodGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\MethodGenerator\SpecDateTimeToStringMethodGenerator
 * @group  todo
 */
class SpecDateTimeToStringMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SpecDateTimeToStringMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new SpecDateTimeToStringMethodGenerator();
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
