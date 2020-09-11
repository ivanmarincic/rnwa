<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {

        return view("pages.employees", ["employees" => Employee::with(['department', 'branch', 'superior'])->get()]);
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'id' => ['required'],
                'first_name' => ['required'],
                'last_name' => ['required'],
                'start_date' => ['required'],
                'department' => ['required'],
                'branch' => ['required'],
                'title' => ['required'],
            ]);
            $employee = Employee::firstWhere('EMP_ID', $request->input('id'));
            $employee->START_DATE = $request->input('start_date');
            $employee->END_DATE = $request->input('end_date');
            $employee->FIRST_NAME = $request->input('first_name');
            $employee->LAST_NAME = $request->input('last_name');
            $employee->DEPT_ID = $request->input('department');
            $employee->ASSIGNED_BRANCH_ID = $request->input('branch');
            $employee->TITLE = $request->input('title');
            $employee->save();
            return response(["message" => "Employee updated"], 200);
        }
        return view("pages.employee_edit", [
            "employee" => Employee::with(['department', 'branch', 'superior'])->firstWhere('EMP_ID', $id),
            "departments" => Department::all(),
            "branches" => Branch::all(),
        ]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'first_name' => ['required'],
                'last_name' => ['required'],
                'start_date' => ['required'],
                'department' => ['required'],
                'branch' => ['required'],
                'title' => ['required'],
            ]);
            $employee = new Employee();
            $employee->START_DATE = $request->input('start_date');
            $employee->END_DATE = $request->input('end_date');
            $employee->FIRST_NAME = $request->input('first_name');
            $employee->LAST_NAME = $request->input('last_name');
            $employee->DEPT_ID = $request->input('department');
            $employee->ASSIGNED_BRANCH_ID = $request->input('branch');
            $employee->TITLE = $request->input('title');
            $employee->save();
            return response(["message" => "Employee updated"], 200);
        }
        return view("pages.employee_add", [
            "departments" => Department::all(),
            "branches" => Branch::all(),
        ]);
    }

    public function delete(Request $request)
    {
        $this->validate($request, [
            'id' => ['required'],
        ]);
        Employee::where('EMP_ID', $request->input('id'))->delete();
        return redirect("/employees");
    }
}
