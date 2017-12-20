<?php

declare(strict_types=1);

namespace tests\NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\SetUpMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\PhpUnit\Middleware\SetUpMiddleware
 * @group  todo
 */
class SetUpMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SetUpMiddleware */
    private $setUpMiddleware;

    public function setUp()
    {
        $this->setUpMiddleware = new SetUpMiddleware(new ExampleMaker());
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
