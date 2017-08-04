<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Uuid\Handler;

use NullDev\PhpSpecSkeleton\SpecGenerator;
use NullDev\PHPUnitSkeleton\PHPUnitTestGenerator;
use NullDev\Skeleton\SourceFactory\Uuid4IdentitySourceFactory;
use NullDev\Skeleton\Uuid\Command\CreateUuidClass;

/**
 * @see CreateUuidClassHandlerSpec
 * @see CreateUuidClassHandlerTest
 */
class CreateUuidClassHandler
{
    /** @var Uuid4IdentitySourceFactory */
    private $sourceFactory;

    /** @var SpecGenerator */
    private $specGenerator;

    /** @var PHPUnitTestGenerator */
    private $testGenerator;

    public function __construct(
        Uuid4IdentitySourceFactory $sourceFactory,
        SpecGenerator $specGenerator,
        PHPUnitTestGenerator $testGenerator
    ) {
        $this->sourceFactory = $sourceFactory;
        $this->specGenerator = $specGenerator;
        $this->testGenerator = $testGenerator;
    }

    public function handle(CreateUuidClass $command): array
    {
        $classSource = $this->sourceFactory->create($command->getClassType());
        $specSource  = $this->specGenerator->generate($classSource);
        $testSource  = $this->testGenerator->generate($classSource);

        return [$classSource, $specSource, $testSource];
    }
}
