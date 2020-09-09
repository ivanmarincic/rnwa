<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $table = "customer";
    protected $primaryKey = "CUST_ID";
    public $timestamps = false;
    protected $fillable = [
        "CUST_ID", "ADDRESS", "CITY", "CUST_TYPE_CD", "FED_ID", "POSTAL_CODE", "STATE",
    ];

    public function individual()
    {
        return $this->hasOne('App\Models\Individual', "CUST_ID", "CUST_ID");
    }

    public function officer()
    {
        return $this->hasOne('App\Models\Officer', "CUST_ID", "CUST_ID");
    }
}
