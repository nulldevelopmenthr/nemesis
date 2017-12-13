<?php

declare(strict_types=1);

namespace NullDev\PhpSpecSkeleton\Definition\PHP\Methods;

use Exception;
use NullDev\Skeleton\Definition\PHP\Methods\Method;
use NullDev\Skeleton\Definition\PHP\Types\Type;
use Webmozart\Assert\Assert;

class InitializableMethod implements Method
{
    private $shouldHaveTypes;

    public function __construct(array $shouldHaveTypes)
    {
        Assert::allIsInstanceOf($shouldHaveTypes, Type::class);
        $this->shouldHaveTypes = $shouldHaveTypes;
    }

    /** @return Type[]|array */
    public function getShouldHaveTypes(): array
    {
        return $this->shouldHaveTypes;
    }

    public function getVisibility(): string
    {
        return 'public';
    }

    public function isStatic(): bool
    {
        return false;
    }

    public function getMethodName(): string
    {
        return 'it_is_initializable';
    }

    public function getMethodParameters(): array
    {
        return [];
    }

    public function hasMethodReturnType(): bool
    {
        return false;
    }

    public function getMethodReturnType(): string
    {
        throw new Exception('Err 543545: PhpSpec InitializableMethod doesnt use return types.');
    }
}
