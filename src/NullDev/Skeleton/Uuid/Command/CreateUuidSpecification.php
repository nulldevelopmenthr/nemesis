<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Uuid\Command;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;

/**
 * @see CreateUuidSpecificationSpec
 * @see CreateUuidSpecificationTest
 */
class CreateUuidSpecification
{
    /** @var string */
    private $fileName;
    /** @var ClassType */
    private $classType;

    public function __construct(string $fileName, ClassType $classType)
    {
        $this->fileName  = $fileName;
        $this->classType = $classType;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function getClassType(): ClassType
    {
        return $this->classType;
    }

    public function getClassSource(): ImprovedClassSource
    {
        return new ImprovedClassSource($this->classType);
    }
}
