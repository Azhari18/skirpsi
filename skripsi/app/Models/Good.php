<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // protected $fillable = [
    //     'category_id',
    //     'name',
    //     'price',
    //     'img',
    //   ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
