<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = "department";
    protected $primaryKey = "DEPT_ID";
    public $timestamps = false;
    protected $fillable = [
        "DEPT_ID", "NAME",
    ];
}
