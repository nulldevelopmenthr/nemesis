<?php

declare(strict_types=1);

namespace Tests\App;

use App\Application;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @covers \App\Application
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
