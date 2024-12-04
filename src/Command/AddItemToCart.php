<?php

declare(strict_types=1);

namespace App\Command;
use Sylius\Bundle\ApiBundle\Attribute\OrderTokenValueAware;
use Symfony\Component\Serializer\Attribute\Groups;

#[OrderTokenValueAware]
final class AddItemToCart extends \Sylius\Bundle\ApiBundle\Command\Cart\AddItemToCart
{
    public readonly string $orderTokenValue;
    public readonly string $productVariantCode;
    public readonly int $quantity;

    public function __construct(
        string $orderTokenValue,
        string $productVariantCode,
        int $quantity,
        #[Groups('sylius:shop:cart:add_item')]
        public readonly float $amount,
    ) {
        parent::__construct($orderTokenValue, $productVariantCode, $quantity);
    }
}
