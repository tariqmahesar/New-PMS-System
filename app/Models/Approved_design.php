<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approved_design extends Model
{

    protected $fillable = array('id','userid','designerid','designid','sectionid','approved_status','status');
    
    use HasFactory;
}
