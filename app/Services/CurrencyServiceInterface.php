<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

interface CurrencyServiceInterface
{
    /**
     * @return Collection
     */
    public function findAll(): Collection;
    /**
     * Returns currency by id.
     *
     * @param  int $id
     * @return mixed
     */
    public function findById(int $id);
    /**
     * Store currency
     *
     * @param  array $data
     * @return void
     */
    public function store(array $data): void;
    /**
     * Updates a currency
     *
     * @param  int $id
     * @param  array $data
     * @return void
     */
    public function update(int $id,array $data): void;
    /**
     * Delete currency by id.
     *
     * @param  int $id
     * @return void
     */
    public function delete(int $id): void;
  
}