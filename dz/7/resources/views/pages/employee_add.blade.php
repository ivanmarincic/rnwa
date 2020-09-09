@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation redirect" data-redirect="/employees" method="post">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="first_name"
                                   placeholder="First name">
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="firstName" name="last_name"
                                   placeholder="Last name">
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                   placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="department">Department</label>
                            <select class="form-control" id="department" name="department">
                                @foreach($departments as $department)
                                    <option {{$loop->first? 'selected' : ''}} value="{{$department->DEPT_ID}}">
                                        {{$department->NAME}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="branch">Branch</label>
                            <select class="form-control" id="branch" name="branch">
                                @foreach($branches as $branch)
                                    <option {{$loop->first? 'selected' : ''}} value="{{$branch->BRANCH_ID}}">
                                        {{$branch->NAME}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Start date</label>
                            <input type="text" class="form-control" id="start_date" name="start_date"
                                   placeholder="yyyy-mm-dd">
                        </div>
                        <div class="form-group">
                            <label for="end_date">End date</label>
                            <input type="text" class="form-control" id="end_date" name="end_date"
                                   placeholder="yyyy-mm-dd">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
