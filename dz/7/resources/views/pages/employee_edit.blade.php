@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" method="post">
                        <input type="hidden" name="id" value="{{$employee->EMP_ID}}"/>
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="first_name"
                                   placeholder="First name"
                                   value="{{$employee->FIRST_NAME}}">
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="firstName" name="last_name"
                                   placeholder="Last name"
                                   value="{{$employee->LAST_NAME }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                   placeholder="Title"
                                   value="{{$employee->TITLE}}">
                        </div>
                        <div class="form-group">
                            <label for="department">Department</label>
                            <select class="form-control" id="department" name="department">
                                @foreach($departments as $department)
                                    <option
                                        {{$employee->DEPT_ID ==  $department->DEPT_ID? 'selected' : ''}} value="{{$department->DEPT_ID}}">
                                        {{$department->NAME}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="branch">Branch</label>
                            <select class="form-control" id="branch" name="branch">
                                @foreach($branches as $branch)
                                    <option
                                        {{$employee->ASSIGNED_BRANCH_ID ==  $branch->BRANCH_ID? 'selected' : ''}} value="{{$branch->BRANCH_ID}}">
                                        {{$branch->NAME}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Start date</label>
                            <input type="text" class="form-control" id="start_date" name="start_date"
                                   placeholder="yyyy-mm-dd"
                                   value="{{$employee->START_DATE}}">
                        </div>
                        <div class="form-group">
                            <label for="end_date">End date</label>
                            <input type="text" class="form-control" id="end_date" name="end_date"
                                   placeholder="yyyy-mm-dd"
                                   value="{{$employee->END_DATE}}">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
