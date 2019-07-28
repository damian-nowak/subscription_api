<?php

namespace Domain\Contracts\Repositories;

interface RepositoryInterface
{
    public function findAll();

    public function find($id);

    public function create($data);

    public function update($id, $data);

    public function delete($id);
}