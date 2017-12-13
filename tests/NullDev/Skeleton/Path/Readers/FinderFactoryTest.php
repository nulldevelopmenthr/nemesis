<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Path\Readers;

use NullDev\Skeleton\Path\Readers\FinderFactory;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Finder\Finder;

/**
 * @covers \NullDev\Skeleton\Path\Readers\FinderFactory
 * @group  unit
 */
class FinderFactoryTest extends TestCase
{
    public function testCreate()
    {
        $factory = new FinderFactory();

        self::assertInstanceOf(Finder::class, $factory->create());
    }
}
