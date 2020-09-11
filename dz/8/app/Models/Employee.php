<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $table = "employee";
    protected $primaryKey = "EMP_ID";
    public $timestamps = false;
    protected $fillable = [
        "EMP_ID", "END_DATE", "FIRST_NAME", "LAST_NAME", "START_DATE", "TITLE", "ASSIGNED_BRANCH_ID", "DEPT_ID", "SUPERIOR_EMP_ID"
    ];

    public function department()
    {
        return $this->belongsTo('App\Models\Department', "DEPT_ID", "DEPT_ID");
    }

    public function branch()
    {
        return $this->belongsTo('App\Models\Branch', "ASSIGNED_BRANCH_ID", "BRANCH_ID");
    }

    public function superior()
    {
        return $this->belongsTo('App\Models\Employee', "SUPERIOR_EMP_ID", "EMP_ID");
    }
}
