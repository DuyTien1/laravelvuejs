<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['story_id', 'chapternumber', 'chaptername', 'content'];
    protected $primaryKey = 'id';
    protected $table = 'chapters';
}
