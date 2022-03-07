<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;


class Post extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
    
    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    } 
   
    protected $fillable = 
     [ 
        'title',
        'content',
        'user_id',
        'image' 
     ];

     public function user(){
      return $this->belongsTo(User::class);
   }

   public function comments()
   {
       return $this->morphMany(Comment::class, 'commentable');
   }

}

