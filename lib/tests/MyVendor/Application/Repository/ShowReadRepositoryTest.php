<?php

declare(strict_types=1);

namespace Tests\MyVendor\Application\Repository;

use MyVendor\Application\Repository\ShowReadRepository;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MyVendor\Application\Repository\ShowReadRepository
 * @group  todo
 */
class ShowReadRepositoryTest extends TestCase
{
    /** @var ShowReadRepository */
    private $sut;

    public function setUp()
    {
        $this->sut = new ShowReadRepository();
    }
}
