<?php

namespace App\Services;

use App\Services\CurrencyServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Currency;
 
class CurrencyService implements CurrencyServiceInterface
{
    /**
     * @inheritdoc
     */
    public function findAll(): Collection 
    {
         return Currency::all();
    }
    /**
     * Returns currency by id.
     *
     * @param  int $id
     * @return Currency|null
     */
    public function findById(int $id): ?Currency
    {
        return Currency::findOrFail($id);
    }
    /**
     * @inheritdoc
     */
    public function store(array $data): void 
    {
         Currency::create([
            'title' => $data['title'],
            'short_name' => $data['short_name'],
            'logo_url'  => $data['logo_url'],
            'price'  => $data['price']
        ]);
    }
    /**
     * @inheritdoc
     */ 
    public function update(int $id,array $data): void
    {
        
        Currency::find($id)->update([
            'title' => $data['title'],
            'short_name' => $data['short_name'],
            'logo_url'  => $data['logo_url'],
            'price'  => $data['price']
        ]);
        
    }
    /**
     * @inheritdoc
     */
    public function delete(int $id): void
    {
        Currency::find($id)->delete();
    }


}