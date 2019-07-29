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

    public function getSubscriptionVideos(int $sub_id)
    {
        return $this->domainService->getSubscriptionVideos($sub_id);
    }

    public function addVideoToSubscription(int $vid_id, int  $sub_id)
    {
        return $this->domainService->addVideoToSubscription($vid_id, $sub_id);
    }

    public function removeVideoFromSubscription(int $vid_id, int  $sub_id)
    {
        return $this->domainService->removeVideoFromSubscription($vid_id, $sub_id);
    }
}
