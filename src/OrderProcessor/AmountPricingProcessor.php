<?php

declare(strict_types=1);

namespace App\OrderProcessor;

use App\Entity\Order\OrderItem;
use Sylius\Bundle\OrderBundle\Attribute\AsOrderProcessor;
use Sylius\Component\Order\Model\OrderInterface;
use Sylius\Component\Order\Processor\OrderProcessorInterface;

#[AsOrderProcessor(priority: 45)]
final class AmountPricingProcessor implements OrderProcessorInterface
{
    public function process(OrderInterface $order): void
    {
        /** @var OrderItem $orderItem */
        foreach ($order->getItems() as $orderItem) {
            if ($orderItem->getAmount() > 0) {
                $orderItem->setUnitPrice(
                    (int) ($orderItem->getUnitPrice() * $orderItem->getAmount()));
            }
        }
    }
}
