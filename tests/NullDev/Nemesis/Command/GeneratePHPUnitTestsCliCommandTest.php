<?php

declare(strict_types=1);

namespace tests\NullDev\Nemesis\Command;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Nemesis\Command\GeneratePHPUnitTestsCliCommand;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Nemesis\Command\GeneratePHPUnitTestsCliCommand
 * @group  todo
 */
class GeneratePHPUnitTestsCliCommandTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var  */
    private $name;
    /** @var GeneratePHPUnitTestsCliCommand */
    private $generatePHPUnitTestsCliCommand;

    public function setUp()
    {
        $this->name                           = 'name';
        $this->generatePHPUnitTestsCliCommand = new GeneratePHPUnitTestsCliCommand($this->name);
    }

    public function testIgnoreValidationErrors()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testSetApplication()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testSetHelperSet()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetHelperSet()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetApplication()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testIsEnabled()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testRun()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testSetCode()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testMergeApplicationDefinition()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testSetDefinition()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetDefinition()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetNativeDefinition()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testAddArgument()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testAddOption()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testSetName()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testSetProcessTitle()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetName()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testSetHidden()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testIsHidden()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testSetDescription()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetDescription()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testSetHelp()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetHelp()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetProcessedHelp()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testSetAliases()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetAliases()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetSynopsis()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testAddUsage()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetUsages()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetHelper()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testSetContainer()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetService()
    {
        $this->markTestSkipped('Skipping');
    }
}
