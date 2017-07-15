<?php

declare(strict_types=1);

namespace NullDev\Skeleton\CodeGenerator\PhpParser;

use NullDev\Skeleton\CodeGenerator\CodeGenerator;
use NullDev\Skeleton\Definition\PHP\Methods\Method;
use Webmozart\Assert\Assert;

/**
 * @see MethodFactorySpec
 */
class MethodFactory
{
    /** @var array */
    private $generators;

    public function __construct(array $generators)
    {
        Assert::allImplementsInterface($generators, CodeGenerator::class);
        $this->generators = $generators;
    }

    public function generate(Method $method)
    {
        foreach ($this->generators as $generator) {
            if (true === $generator->supports($method)) {
                return $generator->generate($method);
            }
        }

        throw new \Exception('ERR 12431999: Unhandled method:'.get_class($method));
    }
}
