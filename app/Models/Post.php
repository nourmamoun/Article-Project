<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    protected $fillable=["name","description","user_id","file_path","body"];

    function user(){
        return $this->belongsTo(User::class);
    }
}
