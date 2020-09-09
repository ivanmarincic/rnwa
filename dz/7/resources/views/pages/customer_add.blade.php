@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation redirect" data-redirect="/customers" method="post">
                        <div class="form-group">
                            <label for="customerType">Type</label>
                            <select class="form-control" id="customerType" name="type">
                                <option selected value="I">I</option>
                                <option value="B">B</option>
                            </select>
                        </div>
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
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                        </div>
                        <div class="form-group type-b">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                        </div>
                        <div class="form-group type-i">
                            <label for="birth">Birth date</label>
                            <input type="text" class="form-control" id="birth" name="birth_date"
                                   placeholder="yyyy-mm-dd">
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="City">
                        </div>
                        <div class="form-group">
                            <label for="post">Post Code</label>
                            <input type="text" class="form-control" id="post" name="postal_code"
                                   placeholder="Post Code">
                        </div>
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" class="form-control" id="state" name="state" placeholder="State">
                        </div>
                        <div class="form-group">
                            <label for="fed">Fed ID</label>
                            <input type="text" class="form-control" id="fed" name="fed_id" placeholder="Fed ID">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
