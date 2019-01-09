<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_data extends Model
{
    //Table
    protected $table = 'users';

    //table filed
    protected $fillable = ['USERNAME','PASSWORD','EMER_MBIEMER','GJINIA','QYTETI','ADRESA','CEL','TEL','EMAIL','ROLI','CR_DATE','LAST_UPDATE'];
}
