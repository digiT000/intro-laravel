<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blogpost extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
        'title',
        'content',
        'description',
        'user_id',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    // 1 Post belong to 1 user only
    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
