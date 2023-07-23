<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['category_id', 'story_id'];
    protected $primaryKey = 'id';
    protected $table = 'category_details';
}
