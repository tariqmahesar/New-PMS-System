<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designfiles extends Model
{

	protected $fillable = array('id','designid','imagepath','image');
    use HasFactory;
}
