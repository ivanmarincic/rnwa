@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" method="post">
                        <input type="hidden" name="id" value="{{$customer->CUST_ID}}"/>
                        <div class="form-group">
                            <label for="customerType">Type</label>
                            <select class="form-control" id="customerType" name="type">
                                <option {{$customer->CUST_TYPE_CD == 'I' ? 'selected' : ''}} value="I">I</option>
                                <option {{$customer->CUST_TYPE_CD == 'B' ? 'selected' : ''}} value="B">B</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="first_name"
                                   placeholder="First name"
                                   value="{{$customer->CUST_TYPE_CD == 'I' ? $customer->individual->FIRST_NAME : $customer->officer->FIRST_NAME}}">
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="firstName" name="last_name"
                                   placeholder="Last name"
                                   value="{{$customer->CUST_TYPE_CD == 'I' ? $customer->individual->LAST_NAME : $customer->officer->LAST_NAME}}">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address"
                                   value="{{$customer->ADDRESS}}">
                        </div>
                        <div class="form-group type-b">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                   value="{{$customer->officer ? $customer->officer->TITLE : ""}}">
                        </div>
                        <div class="form-group type-i">
                            <label for="birth">Birth date</label>
                            <input type="text" class="form-control" id="birth" name="birth_date"
                                   placeholder="yyyy-mm-dd"
                                   value="{{$customer->individual ? $customer->individual->BIRTH_DATE : ""}}">
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="City"
                                   value="{{$customer->CITY}}">
                        </div>
                        <div class="form-group">
                            <label for="post">Post Code</label>
                            <input type="text" class="form-control" id="post" name="postal_code" placeholder="Post Code"
                                   value="{{$customer->POSTAL_CODE}}">
                        </div>
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" class="form-control" id="state" name="state" placeholder="State"
                                   value="{{$customer->STATE}}">
                        </div>
                        <div class="form-group">
                            <label for="fed">Fed ID</label>
                            <input type="text" class="form-control" id="fed" name="fed_id" placeholder="Fed ID"
                                   value="{{$customer->FED_ID}}">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
