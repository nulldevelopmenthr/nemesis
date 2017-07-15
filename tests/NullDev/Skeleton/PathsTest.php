<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton;

use NullDev\Skeleton\Paths;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Paths
 * @group  nemesis
 */
class PathsTest extends PHPUnit_Framework_TestCase
{
    /** @var Paths */
    private $paths;

    public function setUp(): void
    {
        $this->paths = new Paths(
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
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
