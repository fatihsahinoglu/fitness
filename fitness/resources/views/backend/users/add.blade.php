@extends('backend.layout')
@section('content')
<section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add New User</h3>
            </div>
            <div class="box-body">
                <form action="{{route('users.addItem')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Role</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select class="form-control" name="role" required>
                                    <option value="">Select Role</option>
                                    <option value="ADMIN">Admin</option>
                                    <option value="USER">User</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="name" value="" pattern="[a-zA-Z]{1,32}$" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Surname</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="surname" value="" pattern="[a-zA-Z]{1,32}$" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="email" value="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="password" value="" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" id=phone name="phone" value="" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Birthday</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="date" name="birthday" value="" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Age</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="number" name="age" value="0" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Height</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="number" name="height" value="0" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Weight</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="number"  name="weight" value="0" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>BMR</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="number"  name="bmr" value="0" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Gender</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select class="form-control" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Type</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select class="form-control" name="type" required>
                                    <option value="">Select Type</option>
                                    <option value="monthly">Monthly</option>
                                    <option value="3_month">3 Month</option>
                                    <option value="6_month">6 Month</option>
                                    <option value="1_year">1 Year</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div align="right" class="box-footer">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            </div>
        </div>
</section>

@endsection
@section('css') @endsection
@section('js') @endsection
