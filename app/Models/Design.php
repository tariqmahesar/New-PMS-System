<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
	protected $fillable = array('id','categoryid','userid','design_name');
	
    use HasFactory;
}
