<?php

namespace App\Core\Services;

use App\Core\Contracts\ApplicationServiceInterface;

class AbstractApplicationService implements ApplicationServiceInterface
{
    protected $domainService;

    public function __construct($domainService)
    {
        $this->domainService = $domainService;
    }

    public function findAll()
    {
        return $this->domainService->findAll();
    }

    public function find(int $id)
    {
        return $this->domainService->find($id);
    }

    public function create(array $data)
    {
        return $this->domainService->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->domainService->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->domainService->delete($id);
    }

}
