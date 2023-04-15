<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'supplier_id'
    ];

    public function supplier()
    {
        return $this->BelongsToMany(Supplier::class);
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
