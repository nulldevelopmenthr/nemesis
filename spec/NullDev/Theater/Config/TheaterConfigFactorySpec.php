<?php

declare(strict_types=1);

namespace spec\NullDev\Theater\Config;

use NullDev\Theater\BoundedContext\BoundedContextConfig;
use NullDev\Theater\BoundedContext\BoundedContextConfigFactory;
use NullDev\Theater\Config\TheaterConfig;
use NullDev\Theater\Config\TheaterConfigFactory;
use PhpSpec\ObjectBehavior;

class TheaterConfigFactorySpec extends ObjectBehavior
{
    public function let(BoundedContextConfigFactory $boundedContextConfigFactory)
    {
        $this->beConstructedWith($boundedContextConfigFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TheaterConfigFactory::class);
    }

    public function it_will_create_theater_config_from_given_array(
        BoundedContextConfigFactory $boundedContextConfigFactory,
        BoundedContextConfig $boundedContextConfig
    ) {
        $buyerContextData = [
            'namespace' => 'MyCompany\Webshop\Buyers',
            'classes'   => [
                'id'         => 'MyCompany\Webshop\Buyers\Core\BuyerId',
                'model'      => 'MyCompany\Webshop\Buyers\Domain\BuyerModel',
                'repository' => 'MyCompany\Webshop\Buyers\Domain\BuyerRepository',
                'handler'    => 'MyCompany\Webshop\Buyers\Application\BuyersCommandHandler',
                'entities'   => [],
                'commands'   => [],
                'events'     => [],
            ],
        ];

        $input = [
            'contexts' => [
                'Buyer' => $buyerContextData,
            ],
        ];

        $boundedContextConfigFactory->createFromArray('Buyer', $buyerContextData)
            ->shouldBeCalled()
            ->willReturn($boundedContextConfig);

        $this->createFromArray($input)
            ->shouldReturnAnInstanceOf(TheaterConfig::class);
    }
}
