<?php

namespace App\Subscriptions\Services;

use App\Core\Services\AbstractApplicationService;
use Domain\Contracts\Services\SubscriptionDomainServiceInterface;

class SubscriptionApplicationService extends AbstractApplicationService
{
    public function __construct(SubscriptionDomainServiceInterface $subscriptionDomainService)
    {
        parent::__construct($subscriptionDomainService);
    }
}
