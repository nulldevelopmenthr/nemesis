<?php

declare(strict_types=1);

namespace tests\NullDev\Nemesis;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Nemesis\ReflectionSourceParserContext;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Nemesis\ReflectionSourceParserContext
 * @group  todo
 */
class ReflectionSourceParserContextTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var ReflectionSourceParserContext */
    private $reflectionSourceParserContext;

    public function setUp()
    {
        $this->reflectionSourceParserContext = new ReflectionSourceParserContext();
    }

    public function testParseIt()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testSourceFileContains()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testResultIsAnEmptyArray()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testResultIsAnInstanceOf()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testResultHasImport()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testResultWillHaveThisImports()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testResultHasNoConstructorMethodDefined()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testResultHasConstructorMethodDefined()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testResultHasConstructorParameters()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testResultWillHaveThisConstructorParameters()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testResultHasProperties()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testResultWillHaveThisProperties()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testResultHasMethods()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testResultHasGetterMethods()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testResultWillHaveThisGettermethods()
    {
        $this->markTestSkipped('Skipping');
    }
}
