<?php

namespace Domain\Services;

use Domain\Abstractions\AbstractDomainService;
use Domain\Contracts\Services\SubscriptionDomainServiceInterface;
use Infrastructure\Subscriptions\SubscriptionRepository;

class SubscriptionDomainService extends AbstractDomainService implements SubscriptionDomainServiceInterface
{
    public $repository;

    public function __construct(SubscriptionRepository $repository)
    {
        $this->repository = $repository;
    }
}
