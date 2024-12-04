<?php

declare(strict_types=1);

namespace App\Form\Extension;

use Sylius\Bundle\ShopBundle\Form\Type\CartItemType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use function Sodium\add;

final class CartItemExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('amount');
    }

    public static function getExtendedTypes(): iterable
    {
        yield CartItemType::class;
    }
}
