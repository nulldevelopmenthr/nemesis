<?php

declare(strict_types=1);

namespace tests\NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods\LetGenerator;
use PhpParser\BuilderFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods\LetGenerator
 * @group nemesis
 */
class LetGeneratorTest extends PHPUnit_Framework_TestCase
{
    /** @var LetGenerator */
    private $letGenerator;

    public function setUp(): void
    {
        $this->letGenerator = new LetGenerator(new BuilderFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
