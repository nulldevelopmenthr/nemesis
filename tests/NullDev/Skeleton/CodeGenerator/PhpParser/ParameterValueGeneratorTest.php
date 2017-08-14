<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\CodeGenerator\PhpParser;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Skeleton\CodeGenerator\PhpParser\ParameterValueGenerator;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\CodeGenerator\PhpParser\ParameterValueGenerator
 * @group  todo
 */
class ParameterValueGeneratorTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var ParameterValueGenerator */
    private $parameterValueGenerator;

    public function setUp()
    {
        $this->parameterValueGenerator = new ParameterValueGenerator();
    }

    public function testGenerate()
    {
        $this->markTestSkipped('Skipping');
    }
}
