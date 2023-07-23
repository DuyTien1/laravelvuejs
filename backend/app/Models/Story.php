<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['author_id', 'storyname', 'authorname', 'describe', 'status', 'source'];
    protected $primaryKey = 'id';
    protected $table = 'stories';
}
