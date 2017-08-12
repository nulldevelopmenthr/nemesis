<?php

declare(strict_types=1);

namespace Miro\First;

/**
 * @see CurrencySpec
 * @see CurrencyTest
 */
class Currency
{
    /**
     * @var string
     */
    private $code;

    public function __construct(string $code)
    {
        $this->code = $code;
    }

    public function getCode(): string
    {
        return $this->code;
    }
}
