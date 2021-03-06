<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;
    // protected $guarded = ['id'];

    protected $fillable = [
        'id',
        'category_id',
        'name',
        'price',
        'image',
      ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
