<?php

namespace Domain\Services;

use Domain\Abstractions\AbstractDomainService;
use Domain\Contracts\Services\ClientDomainServiceInterface;
use Infrastructure\Clients\ClientRepository;
use Infrastructure\Videos\VideoRepository;
use Symfony\Component\HttpKernel\HttpCache\SubRequestHandler;
use Infrastructure\Subscriptions\SubscriptionRepository;

class ClientDomainService extends AbstractDomainService implements ClientDomainServiceInterface
{
    public $vidRepository;

    public $subRepository;

    public function __construct(ClientRepository $repository, VideoRepository $vidRepository, SubscriptionRepository $subRepository)
    {
        parent::__construct($repository);
        $this->vidRepository = $vidRepository;
        $this->subRepository = $subRepository;
    }

    public function listClientVideos(int $id)
    {
        return $this->repository->allVideos($id);
    }

    public function clientVideoData(int $id, int $vid_id)
    {
        return $this->repository->clientVideoData($id, $vid_id);
    }

    public function clientAddsVideo(int $id, int $vid_id)
    {
        $client = $this->repository->find($id);
        $vid = $this->vidRepository->find($vid_id);
        return $client->videos()->attach($vid->id);
    }

    public function removeClientVideo(int $id, int $vid_id)
    {
        $client = $this->repository->find($id);
        $vid = $this->vidRepository->find($vid_id);
        return $client->videos()->detach($vid->id);
    }

    public function listClientSubscriptions(int $id)
    {
        return $this->repository->withSubscriptions($id);
    }

    public function clientSubscriptionData(int $id, int $sub_id)
    {
        return $this->repository->clientSubscriptionData($id, $sub_id);
    }

    public function clientSubscribes(int $id, int $sub_id)
    {
        $client = $this->repository->find($id);
        $sub = $this->subRepository->find($sub_id);
        return $client->subscriptions()->attach($sub->id);
    }

    public function clientUnsubscribes(int $id, int $sub_id)
    {
        $client = $this->repository->find($id);
        $sub = $this->subRepository->find($sub_id);
        return $client->subscriptions()->detach($sub->id);
    }
}
