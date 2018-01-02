<?php

declare(strict_types=1);

namespace MyVendor\Theater\Application;

use Broadway\EventSourcing\EventSourcingRepository;

/**
 * @see \spec\MyVendor\Theater\Application\ShowRepositorySpec
 * @see \Tests\MyVendor\Theater\Application\ShowRepositoryTest
 */
class ShowRepository extends EventSourcingRepository
{
    public function __construct()
    {
    }
}
