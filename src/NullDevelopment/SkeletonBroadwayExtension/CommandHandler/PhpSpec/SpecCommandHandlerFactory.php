<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpec;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode\CommandHandler;
use NullDevelopment\SkeletonPhpSpecExtension\PhpSpecMethodFactory;
use Webmozart\Assert\Assert;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpec\SpecCommandHandlerFactorySpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpec\SpecCommandHandlerFactoryTest
 */
class SpecCommandHandlerFactory
{
    /**
     * @var array
     */
    private $factories;

    public function __construct(array $factories)
    {
        Assert::allIsInstanceOf($factories, PhpSpecMethodFactory::class);
        $this->factories = $factories;
    }

    public function createFromCommandHandler(CommandHandler $definition): SpecCommandHandler
    {
        $methods = [];

        foreach ($this->factories as $factory) {
            $methods = array_merge($methods, $factory->create($definition));
        }

        $specClassName  = ClassName::create('spec\\'.$definition->getFullClassName().'Spec');
        $specParentName = ClassName::create('PhpSpec\\ObjectBehavior');

        return new SpecCommandHandler($specClassName, $specParentName, [], [], [], [], $methods, $definition->getName());
    }
}
