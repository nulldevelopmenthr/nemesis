<?php

declare(strict_types=1);

namespace tests\NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods\SetUpGenerator;
use PhpParser\BuilderFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods\SetUpGenerator
 * @group nemesis
 */
class SetUpGeneratorTest extends PHPUnit_Framework_TestCase
{
    /** @var SetUpGenerator */
    private $setUpGenerator;

    public function setUp(): void
    {
        $this->setUpGenerator = new SetUpGenerator(new BuilderFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
