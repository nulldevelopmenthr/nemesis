<?php

declare(strict_types=1);

namespace tests\NullDev;

use App\Application;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class ContainerSupportedTestCase extends TestCase
{
    /** @var ContainerInterface */
    private static $container;

    public static function setUpBeforeClass()
    {
        self::$container = (new Application())->getContainer();
    }

    protected function getService(string $serviceName)
    {
        return self::$container->get($serviceName);
    }
}
