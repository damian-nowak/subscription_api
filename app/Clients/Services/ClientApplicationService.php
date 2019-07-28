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
}
