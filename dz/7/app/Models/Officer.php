<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    protected $table = "officer";
    protected $primaryKey = "OFFICER_ID";
    public $timestamps = false;
    protected $fillable = [
        "START_DATE","END_DATE", "FIRST_NAME", "LAST_NAME", "CUST_ID", "TITLE", "OFFICER_ID"
    ];
}
