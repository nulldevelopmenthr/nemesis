<?php

declare(strict_types=1);

namespace Tests\MyVendor\Application\Factory;

use MyVendor\Application\Factory\ShowReadFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MyVendor\Application\Factory\ShowReadFactory
 * @group  todo
 */
class ShowReadFactoryTest extends TestCase
{
    /** @var ShowReadFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new ShowReadFactory();
    }
}
