<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name', 'photo', 'slug', 'has_size'
    ];

    protected $hidden = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
