<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = "branch";
    protected $primaryKey = "BRANCH_ID";
    public $timestamps = false;
    protected $fillable = [
        "BRANCH_ID", "ADDRESS", "CITY", "NAME", "STATE", "ZIP_CODE",
    ];
}
