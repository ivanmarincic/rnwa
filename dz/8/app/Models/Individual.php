<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Individual extends Model
{
    protected $table = "individual";
    protected $primaryKey = "CUST_ID";
    public $timestamps = false;
    protected $fillable = [
        "BIRTH_DATE", "FIRST_NAME", "LAST_NAME", "CUST_ID"
    ];
}
