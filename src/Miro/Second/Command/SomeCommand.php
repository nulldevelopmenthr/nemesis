<?php

declare(strict_types=1);

namespace Miro\Second\Command;

use Miro\First\Money;

/**
 * @see SomeCommandSpec
 * @see SomeCommandTest
 */
class SomeCommand
{
    /**
     * @var Money
     */
    private $money;

    public function __construct(Money $money)
    {
        $this->money = $money;
    }

    public function getMoney(): Money
    {
        return $this->money;
    }
}
