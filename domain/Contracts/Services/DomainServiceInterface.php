<?php

namespace Domain\Contracts\Services;

interface DomainServiceInterface
{
    public function findAll();

    public function find($id);

    public function create($data);

    public function update($id, $data);

    public function delete($id);
}