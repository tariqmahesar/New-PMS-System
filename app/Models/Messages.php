<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{

	protected $fillable = array('id','senderid','recieverid','sendertype','recievertype','message','readstatus','status');

    use HasFactory;
}
