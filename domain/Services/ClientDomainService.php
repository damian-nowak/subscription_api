<?php

namespace Domain\Services;

use Domain\Abstractions\AbstractDomainService;
use Domain\Contracts\Services\ClientDomainServiceInterface;
use Infrastructure\Clients\ClientRepository;

class ClientDomainService extends AbstractDomainService implements ClientDomainServiceInterface
{
    public $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }
}
