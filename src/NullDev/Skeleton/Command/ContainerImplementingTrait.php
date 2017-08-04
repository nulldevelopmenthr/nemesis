<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Command;

use NullDev\Nemesis\Application;
use NullDev\Nemesis\Config\Config;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @codeCoverageIgnore
 */
trait ContainerImplementingTrait
{
    /**
     * @var ContainerInterface|null
     */
    private $container;

    /**
     * @throws \LogicException
     *
     * @return ContainerInterface
     */
    protected function getContainer()
    {
        if (null === $this->container) {
            /** @var Application $application */
            $application     = $this->getApplication();
            $this->container = $application->getContainer();
        }

        return $this->container;
    }

    /**
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function getService(string $serviceName)
    {
        return $this->getContainer()->get($serviceName);
    }

    private function getConfig(): Config
    {
        return $this->getService(Config::class);
    }
}
