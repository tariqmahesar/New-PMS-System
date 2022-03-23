<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = array('id','userid','designid','sectionid','managerid','notificatoin_comment','read_status','status');
    use HasFactory;
}
