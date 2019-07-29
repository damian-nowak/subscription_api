<?php

namespace Infrastructure\Clients;

use Domain\Contracts\Repositories\RepositoryInterface;
use Infrastructure\Clients\Client;
use Infrastructure\Videos\Video;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ClientRepository implements RepositoryInterface
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function findAll()
    {
        return $this->client::all();
    }

    public function find(int $id)
    {
        return $this->client::findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->client::create([
            'name' => $data['name'],
            'email' => $data['email']
        ]);
    }

    public function update(int $id, array $data)
    {
        $clientToUpdate = $this->client::findOrFail($id);

        empty($data['name']) ?: $clientToUpdate->update([
            'name' => $data['name']
        ]);

        empty($data['email']) ?: $clientToUpdate->update([
            'email' => $data['email']
        ]);

        return $clientToUpdate;
    }

    public function delete(int $id)
    {
        $clientToDelete = $this->client::findOrFail($id);
        return $clientToDelete->delete();
    }

    public function allVideos(int $id)
    {
        $clientsVideos = $this->client::findOrFail($id);
        return $clientsVideos->allVideos();
    }

    public function clientVideoData(int $id, int $vid_id)
    {
        $clientOwningVideo = $this->client::findOrFail($id);
        $ownedVideos = $clientOwningVideo->allVideos();
        $checkOwnership = $ownedVideos->where('id', $vid_id)->count();

        if($checkOwnership === 0){
            throw new NotFoundHttpException('Resource not found', null, 404);
        }

        return $clientOwningVideo->allVideos()->where('id', $vid_id)->first();
    }

    public function withSubscriptions(int $id)
    {
        return ($this->client::findOrFail($id))->subscriptions;
    }

    public function clientSubscriptionData(int $id, int $sub_id)
    {
        $clientWithSub = $this->client::findOrFail($id);
        $checkOwnership = ($clientWithSub->subscriptions->where('id', $sub_id))->count();

        if($checkOwnership === 0){
            throw new NotFoundHttpException('Resource not found', null, 404);
        }

        return $clientWithSub->subscriptions->where('id', $sub_id)->first();
    }
}