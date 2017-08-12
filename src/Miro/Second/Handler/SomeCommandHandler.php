<?php

declare(strict_types=1);

namespace Miro\Second\Handler;

use Miro\First\MoneyConverter;
use Miro\Second\Command\SomeCommand;

/**
 * @see SomeCommandHandlerSpec
 * @see SomeCommandHandlerTest
 */
class SomeCommandHandler
{
    /** @var MoneyConverter */
    private $moneyConverter;

    public function __construct(MoneyConverter $moneyConverter)
    {
        $this->moneyConverter = $moneyConverter;
    }

    public function handle(SomeCommand $someCommand)
    {
        echo $someCommand->getMoney()->getAmount();
    }
}
