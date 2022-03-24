<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manager_notificatio extends Model
{
    protected $fillable = array('id','userid','designid','managerid','notificatoin_comment','read_status','status');

    use HasFactory;
}
