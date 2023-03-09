<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $dates = ['deleted_at'];
    protected $fillable = ['name','price','quantity','category_id ','description','image','status'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
