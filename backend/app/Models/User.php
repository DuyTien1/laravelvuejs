<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['username', 'email', 'password', 'address', 'phone'];
    protected $primaryKey = 'id';
    protected $table = 'users';
}
