<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function product() {
        return $this->hasMany(Product::class);
    }

    public static function tipos(){
        return Category::all()->take(4);
    }
}
