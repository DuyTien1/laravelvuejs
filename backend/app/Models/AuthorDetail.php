<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['author_id', 'user_id'];
    protected $primaryKey = 'id';
    protected $table = 'author_details';
}
