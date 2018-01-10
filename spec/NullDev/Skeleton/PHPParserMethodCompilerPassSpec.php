<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton;

use NullDev\Skeleton\CodeGenerator\PhpParser\MethodFactory;
use NullDev\Skeleton\PHPParserMethodCompilerPass;
use PhpSpec\ObjectBehavior;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

class PHPParserMethodCompilerPassSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(PHPParserMethodCompilerPass::class);
        $this->shouldImplement(CompilerPassInterface::class);
    }

    public function it_will_not_process_when_method_factory_is_not_defined(ContainerBuilder $container)
    {
        $container->has(MethodFactory::class)
            ->shouldBeCalled()
            ->willReturn(false);
        $this->process($container);
    }

    public function it_will_add_all_tagged_services_to_0th_argument(
        ContainerBuilder $container, Definition $serviceDefinition
    ) {
        $container->has(MethodFactory::class)
            ->shouldBeCalled()
            ->willReturn(true);

        $container->findDefinition(MethodFactory::class)
            ->shouldBeCalled()
            ->willReturn($serviceDefinition);

        $container->findTaggedServiceIds('skeleton.method_generator')
            ->shouldBeCalled()
            ->willReturn(['generator1' => [], 'generator2' => []]);

        $serviceDefinition->setArgument(0, [new Reference('generator1'), new Reference('generator2')])
            ->shouldBeCalled();

        $this->process($container);
    }
}
