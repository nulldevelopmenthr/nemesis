<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Path\Readers;

use NullDev\Skeleton\Path\Readers\FinderFactory;
use PHPUnit_Framework_TestCase;
use Symfony\Component\Finder\Finder;

/**
 * @covers \NullDev\Skeleton\Path\Readers\FinderFactory
 * @group  unit
 */
class FinderFactoryTest extends PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $factory = new FinderFactory();

        self::assertInstanceOf(Finder::class, $factory->create());
    }
}
