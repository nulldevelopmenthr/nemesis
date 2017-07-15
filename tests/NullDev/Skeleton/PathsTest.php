<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton;

use NullDev\Skeleton\Path\Psr0Path;
use NullDev\Skeleton\Path\Psr4Path;
use NullDev\Skeleton\Path\SpecPsr0Path;
use NullDev\Skeleton\Path\SpecPsr4Path;
use NullDev\Skeleton\Path\TestPsr0Path;
use NullDev\Skeleton\Path\TestPsr4Path;
use NullDev\Skeleton\Paths;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Paths
 * @group  unit
 */
class PathsTest extends PHPUnit_Framework_TestCase
{
    public function testPsr4Paths(): void
    {
        $paths = new Paths(
            [
                'code'    => [
                    'path'          => 'src/',
                    'prefix'        => '',
                    'autoload_type' => 'psr4',
                ],
                'phpspec' => [
                    'path'          => 'spec/',
                    'prefix'        => 'spec\\',
                    'autoload_type' => 'psr4',
                    'enabled'       => true,
                ],
                'phpunit' => [
                    'path'          => 'tests/',
                    'prefix'        => 'tests\\',
                    'autoload_type' => 'psr4',
                    'enabled'       => true,
                ],
            ]
        );

        $listOfPaths = $paths->getList();

        self::assertInstanceOf(SpecPsr4Path::class, $listOfPaths[0]);
        self::assertInstanceOf(TestPsr4Path::class, $listOfPaths[1]);
        self::assertInstanceOf(Psr4Path::class, $listOfPaths[2]);
    }

    public function testPsr0Paths(): void
    {
        $paths = new Paths(
            [
                'code'    => [
                    'path'          => 'src/',
                    'prefix'        => '',
                    'autoload_type' => 'psr0',
                ],
                'phpspec' => [
                    'path'          => 'spec/',
                    'prefix'        => 'spec\\',
                    'autoload_type' => 'psr0',
                    'enabled'       => true,
                ],
                'phpunit' => [
                    'path'          => 'tests/',
                    'prefix'        => 'tests\\',
                    'autoload_type' => 'psr0',
                    'enabled'       => true,
                ],
            ]
        );

        $listOfPaths = $paths->getList();

        self::assertInstanceOf(SpecPsr0Path::class, $listOfPaths[0]);
        self::assertInstanceOf(TestPsr0Path::class, $listOfPaths[1]);
        self::assertInstanceOf(Psr0Path::class, $listOfPaths[2]);
    }

    public function testSpecAndUnitIfDisabledAreNotLoaded(): void
    {
        $paths = new Paths(
            [
                'code'    => [
                    'path'          => 'src/',
                    'prefix'        => '',
                    'autoload_type' => 'psr4',
                ],
                'phpspec' => [
                    'enabled' => false,
                ],
                'phpunit' => [
                    'enabled' => false,
                ],
            ]
        );

        $listOfPaths = $paths->getList();

        self::assertInstanceOf(Psr4Path::class, $listOfPaths[0]);
    }

    /**
     * @dataProvider provideBrokenAutoloadTypes
     * @expectedException \Exception
     */
    public function testOnlyPsr0AndPsr4PathsAreSupported(array $input): void
    {
        new Paths($input);
    }

    public function provideBrokenAutoloadTypes(): array
    {
        return [
            [
                [
                    'phpspec' => ['autoload_type' => 'xxx', 'enabled' => true],
                ],
            ],
            [
                [
                    'phpspec' => ['enabled' => false],
                    'phpunit' => ['autoload_type' => 'xxx', 'enabled' => true],
                ],
            ],
            [
                [
                    'code'    => ['autoload_type' => 'xxx'],
                    'phpspec' => ['enabled' => false],
                    'phpunit' => ['enabled' => false],
                ],
            ],
        ];
    }
}
