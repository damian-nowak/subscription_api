<?php

namespace Domain\Contracts\Repositories;

interface RepositoryInterface
{
    public function findAll();

    public function find(int $id);

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);
}