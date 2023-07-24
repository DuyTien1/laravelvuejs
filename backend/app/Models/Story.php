<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['author_id', 'story_name', 'author_name', 'describe', 'source'];
    protected $primaryKey = 'id';
    protected $table = 'stories';
}
