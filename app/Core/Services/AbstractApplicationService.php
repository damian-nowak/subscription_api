<?php

namespace App\Core\Services;

use App\Core\Contracts\ApplicationServiceInterface;

class AbstractApplicationService implements ApplicationServiceInterface
{
    private $domainService;

    public function __construct($domainService)
    {
        $this->domainService = $domainService;
    }

    public function findAll()
    {
        return $this->domainService->findAll();
    }

    public function find($id)
    {
        return $this->domainService->find($id);
    }

    public function create($data)
    {
        return $this->domainService->create($data);
    }

    public function update($id, $data)
    {
        return $this->domainService->update($id, $data);
    }

    public function delete($id)
    {
        return $this->domainService->delete($id);
    }

}
