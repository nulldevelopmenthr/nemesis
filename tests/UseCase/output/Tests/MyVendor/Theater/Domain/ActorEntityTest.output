<?php

declare(strict_types=1);

namespace Tests\MyVendor\Theater\Domain;

use MyVendor\Theater\Domain\ActorEntity;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MyVendor\Theater\Domain\ActorEntity
 * @group  todo
 */
class ActorEntityTest extends TestCase
{
    /** @var int */
    private $id;

    /** @var string */
    private $firstName;

    /** @var string */
    private $lastName;

    /** @var ActorEntity */
    private $sut;

    public function setUp()
    {
        $this->id        = 1;
        $this->firstName = 'firstName';
        $this->lastName  = 'lastName';
        $this->sut       = new ActorEntity($this->id, $this->firstName, $this->lastName);
    }
}
