<?php

namespace Domain\Services;

use Domain\Abstractions\AbstractDomainService;
use Domain\Contracts\Services\SubscriptionDomainServiceInterface;
use Infrastructure\Subscriptions\SubscriptionRepository;
use Infrastructure\Videos\VideoRepository;

class SubscriptionDomainService extends AbstractDomainService implements SubscriptionDomainServiceInterface
{
    protected $vidRepository;

    public function __construct(SubscriptionRepository $subRepository, VideoRepository $vidRepository)
    {
        parent::__construct($subRepository);
        $this->vidRepository = $vidRepository;
    }

    public function getSubscriptionVideos(int $sub_id)
    {
        return $this->repository->withVideos($sub_id);
    }

    public function addVideoToSubscription(int $vid_id, int $sub_id)
    {
        $sub = $this->repository->find($sub_id);
        $vid = $this->vidRepository->find($vid_id);
        return $sub->videos()->attach($vid->id);
    }

    public function removeVideoFromSubscription(int $vid_id, int $sub_id)
    {
        $sub = $this->repository->find($sub_id);
        $vid = $this->vidRepository->find($vid_id);
        return $sub->videos()->detach($vid->id);
    }
}
