<?php

declare(strict_types=1);

namespace NullDev\PHPUnitSkeleton\Definition\PHP\Methods;

use Broadway\EventHandling\EventBus;
use Broadway\EventSourcing\EventSourcingRepository;
use Broadway\EventStore\EventStore;
use NullDev\Skeleton\Definition\PHP\Methods\Method;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\ArrayType;
use NullDev\Skeleton\Source\ImprovedClassSource;

/**
 * @see SetUpMethodSpec
 * @see SetUpMethodTest
 */
class SetUpMethod extends SimpleTestMethod implements Method
{
    /** @var ImprovedClassSource */
    private $subjectUnderTest;

    public function __construct(ImprovedClassSource $subjectUnderTest)
    {
        $this->subjectUnderTest = $subjectUnderTest;
    }

    public function getMethodName(): string
    {
        return 'setUp';
    }

    public function getSubjectUnderTest(): ImprovedClassSource
    {
        return $this->subjectUnderTest;
    }

    public function getSubjectUnderTestName(): string
    {
        return $this->subjectUnderTest->getName();
    }

    public function getSubjectUnderTestConstuctorParameters(): array
    {
        $params = $this->subjectUnderTest->getConstructorParameters();

        if ($this->subjectUnderTest->getParentFullName() === EventSourcingRepository::class) {
            $params[] = Parameter::create('eventStore', EventStore::class);
            $params[] = Parameter::create('eventBus', EventBus::class);
            $params[] = Parameter::create('eventStreamDecorators', 'array');
        }

        return $params;
    }

    public function getSubjectUnderTestConstuctorParametersAsClassTypes(): array
    {
        $result = [];
        foreach ($this->subjectUnderTest->getConstructorParameters() as $param) {
            if (true === $param->hasType()) {
                $result[] = $param->getType();
            }
        }

        if ($this->subjectUnderTest->getParentFullName() === EventSourcingRepository::class) {
            $result[] = ClassType::createFromFullyQualified(EventStore::class);
            $result[] = ClassType::createFromFullyQualified(EventBus::class);
            $result[] = new ArrayType();
        }

        return $result;
    }
}
