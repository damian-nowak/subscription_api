<?php

namespace Infrastructure\Clients;

use Domain\Contracts\Repositories\RepositoryInterface;
use Infrastructure\Clients\Client;

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

    public function find($id)
    {
        return $this->client::findOrFail($id);
    }

    public function create($data)
    {
        return $this->client::create([
            'name' => $data['name'],
            'email' => $data['email']
        ]);
    }

    public function update($id, $data)
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

    public function delete($id)
    {
        $clientToDelete = $this->client::findOrFail($id);
        return $clientToDelete->delete();
    }
}