<?php

declare(strict_types=1);

namespace App\Channel;

use Sylius\Bundle\ChannelBundle\Attribute\AsChannelContext;
use Sylius\Component\Channel\Context\ChannelContextInterface;
use Sylius\Component\Channel\Context\ChannelNotFoundException;
use Sylius\Component\Channel\Model\ChannelInterface;
use Sylius\Component\Channel\Repository\ChannelRepositoryInterface;
use Sylius\Component\Customer\Context\CustomerContextInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\VarDumper\VarDumper;

#[AsChannelContext]
final class ChannelContext implements ChannelContextInterface
{
    public function __construct(
        private ChannelRepositoryInterface $channelRepository,
        private TokenStorageInterface $tokenStorage,
    ) {}

    public function getChannel(): ChannelInterface
    {
        if (null === $token = $this->tokenStorage->getToken()) {
            VarDumper::dump($token);
            return $this->channelRepository->findOneByCode('FASHION_WEB');
        }

        $user = $token->getUser();

        VarDumper::dump($user);
        if (null !== $user) {
            return $this->channelRepository->findOneByCode('ANOTHER');
        }

        return $this->channelRepository->findOneByCode('FASHION_WEB');
    }
}
