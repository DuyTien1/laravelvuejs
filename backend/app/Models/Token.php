<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['user_id', 'token', 'token_refresh', 'token_expried', 'token_refresh_expried'];
    protected $primaryKey = 'id';
    protected $table = 'tokens';
}
