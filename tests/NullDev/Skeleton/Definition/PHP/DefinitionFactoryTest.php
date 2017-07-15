<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP;

use NullDev\Skeleton\Definition\PHP\DefinitionFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\DefinitionFactory
 * @group nemesis
 */
class DefinitionFactoryTest extends PHPUnit_Framework_TestCase
{
    /** @var DefinitionFactory */
    private $definitionFactory;

    public function setUp(): void
    {
        $this->definitionFactory = new DefinitionFactory();
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
