<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\DefinitionFactory;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpSpec\Definition\SpecSimpleIdentifier;
use NullDevelopment\Skeleton\PhpSpecMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleIdentifier;
use Webmozart\Assert\Assert;

/**
 * @see SpecSimpleIdentifierFactorySpec
 * @see SpecSimpleIdentifierFactoryTest
 */
class SpecSimpleIdentifierFactory
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

    public function createFromSimpleIdentifier(SimpleIdentifier $definition): SpecSimpleIdentifier
    {
        $methods = [];

        foreach ($this->factories as $factory) {
            $methods = array_merge($methods, $factory->create($definition));
        }

        $specClassName  = ClassName::create('spec\\'.$definition->getFullClassName().'Spec');
        $specParentName = ClassName::create('PhpSpec\\ObjectBehavior');

        return new SpecSimpleIdentifier($specClassName, $specParentName, [], [], [], $methods);
    }
}
