<?php

namespace Domain\Services;

use Domain\Abstractions\AbstractDomainService;
use Domain\Contracts\Services\VideoDomainServiceInterface;
use Infrastructure\Videos\VideoRepository;

class VideoDomainService extends AbstractDomainService implements VideoDomainServiceInterface
{
    public $repository;

    public function __construct(VideoRepository $repository)
    {
        $this->repository = $repository;
    }
}
