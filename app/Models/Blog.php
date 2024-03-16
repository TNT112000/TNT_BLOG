<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    use HasFactory;
    

    protected $fillable = ['name','content', 'image','category_id','total'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
