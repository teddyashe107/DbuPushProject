<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory,Sluggable;

    public function user(){
        return $this -> belongsTo(User::class);
    }
    public function admin(){
        return $this-> belongsTo(Admin::class);
    }

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image_path',
        'user_id'
    ];
     public function sluggable():array{
       return  [
           'slug'=> [
               'source' => 'title'
           ]
       ];
     }

}
