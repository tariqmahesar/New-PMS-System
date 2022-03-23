<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorysections extends Model
{
    protected $fillable = array('id','designid','userid','section','sections_name','imagepath','image','category_sections_status');
    use HasFactory;
}
