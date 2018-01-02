<?php

declare(strict_types=1);

namespace Tests\MyVendor\Theater\Application;

use MyVendor\Theater\Application\ShowRepository;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MyVendor\Theater\Application\ShowRepository
 * @group  todo
 */
class ShowRepositoryTest extends TestCase
{
    /** @var ShowRepository */
    private $sut;

    public function setUp()
    {
        $this->sut = new ShowRepository();
    }
}
