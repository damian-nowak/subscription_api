<?php

namespace App\Clients\Services;

use App\Core\Services\AbstractApplicationService;
use Domain\Contracts\Services\ClientDomainServiceInterface;

class ClientApplicationService extends AbstractApplicationService
{
    public function __construct(ClientDomainServiceInterface $clientDomainService)
    {
        parent::__construct($clientDomainService);
    }

    public function listClientVideos(int $id)
    {
        return $this->domainService->listClientVideos($id);
    }

    public function clientVideoData(int $id, int $vid_id)
    {
        return $this->domainService->clientVideoData($id, $vid_id);
    }

    public function clientAddsVideo(int $id, int $vid_id)
    {
        return $this->domainService->clientAddsVideo($id, $vid_id);
    }

    public function removeClientVideo(int $id, int $vid_id)
    {
        return $this->domainService->removeClientVideo($id, $vid_id);
    }

    public function listClientSubscriptions(int $id)
    {
        return $this->domainService->listClientSubscriptions($id);
    }

    public function clientSubscriptionData(int $id, int $sub_id)
    {
        return $this->domainService->clientSubscriptionData($id, $sub_id);
    }

    public function clientSubscribes(int $id, int $sub_id)
    {
        return $this->domainService->clientSubscribes($id, $sub_id);
    }

    public function clientUnsubscribes(int $id, int $sub_id)
    {
        return $this->domainService->clientUnsubscribes($id, $sub_id);
    }
}
