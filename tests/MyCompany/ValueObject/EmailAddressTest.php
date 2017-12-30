<?php

declare(strict_types=1);

namespace Tests\MyCompany\ValueObject;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use MyCompany\ValueObject\EmailAddress;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MyCompany\ValueObject\EmailAddress
 * @group  todo
 */
class EmailAddressTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var string */
    private $email;

    /** @var EmailAddress */
    private $emailAddress;

    public function setUp()
    {
        $this->email        = 'email';
        $this->emailAddress = new EmailAddress($this->email);
    }

    public function testGetEmail()
    {
        self::assertEquals($this->email, $this->emailAddress->getEmail());
    }
}
