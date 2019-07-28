<?php

namespace App\Videos\Services;

use App\Core\Services\AbstractApplicationService;
use Domain\Contracts\Services\VideoDomainServiceInterface;

class VideoApplicationService extends AbstractApplicationService
{
    public function __construct(VideoDomainServiceInterface $videoDomainService)
    {
        parent::__construct($videoDomainService);
    }
}
