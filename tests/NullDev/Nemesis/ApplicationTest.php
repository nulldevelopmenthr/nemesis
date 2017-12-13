<?php

declare(strict_types=1);

namespace tests\NullDev\Nemesis;

use NullDev\Nemesis\Application;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @covers \NullDev\Nemesis\Application
 * @group  integration
 */
class ApplicationTest extends TestCase
{
    /** @var Application */
    private $application;

    public function setUp()
    {
        $this->application = new Application();
    }

    public function testItExposesContainer()
    {
        self::assertInstanceOf(ContainerBuilder::class, $this->application->getContainer());
    }
}
