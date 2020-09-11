@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Employees</h4>
                    <div class="card-description">
                        <a href="/employees/add" type="button" class="btn btn-primary btn-rounded btn-fw">ADD</a>
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                             aria-labelledby="deleteModalLabel" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Are you sure you want to delete
                                            this item</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel
                                        </button>
                                        <form method="post" action="/employees/delete">
                                            <input id="deleteField" name="id" type="hidden"/>
                                            <button type="submit" class="btn btn-danger">Yes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Branch
                                </th>
                                <th>
                                    Department
                                </th>
                                <th>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td width="40" class="text-center">
                                        {{$employee->TITLE}}
                                    </td>
                                    <td>
                                        {{$employee->FIRST_NAME}} {{$employee->LAST_NAME}}
                                    </td>
                                    <td>
                                        {{$employee->branch->NAME}}
                                    </td>
                                    <td>
                                        {{$employee->department->NAME}}
                                    </td>
                                    <td width="120" class="text-right">
                                        <a href="/employees/edit/{{$employee->EMP_ID}}">
                                            <button type="button"
                                                    class="btn btn-outline-secondary btn-rounded btn-icon">
                                                <i class="mdi mdi-pencil"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-outline-secondary btn-rounded btn-icon"
                                                data-delete="{{$employee->EMP_ID}}" data-toggle="modal"
                                                data-target="#deleteModal">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
