<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model;

use NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model\AggregateRootIdGetterGenerator;
use PhpParser\BuilderFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model\AggregateRootIdGetterGenerator
 * @group nemesis
 */
class AggregateRootIdGetterGeneratorTest extends PHPUnit_Framework_TestCase
{
    /** @var AggregateRootIdGetterGenerator */
    private $aggregateRootIdGetterGenerator;

    public function setUp(): void
    {
        $this->aggregateRootIdGetterGenerator = new AggregateRootIdGetterGenerator(new BuilderFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
