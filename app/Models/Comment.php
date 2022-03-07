<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    public function Commentable(){
        return $this->morphTo();
    }


    protected $fillable = [
        'body',
        'commentable_id',
        'commentable_type',
        'commented_by'

    ];


    public function commentedBy(){

        return $this->belongsTo(User::class , 'commented_by');
    }


}
