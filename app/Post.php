<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'cat_id',
        'user_id',
        'title',
        'description',
        'photo',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class, 'cat_id');
    }

//    public $path = '/images/';
//    public function getPhotoAttribute($value){
//        return asset($this->path.$value);
//    }

}
