<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends BaseModel
{
    protected $fillable = [
        'category_id',
        'name',
        'sku',
        'price',
        'quantity',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

}
