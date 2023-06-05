@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">User Detail</h3>
            </div>
            <div class="box-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Role</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select class="form-control" name="role" required>
                                    <option value="">Select Role</option>
                                    <option value="ADMIN" {{ $data['user']->role == 'ADMIN' ? 'selected' : '' }}>Admin</option>
                                    <option value="USER" {{ $data['user']->role == 'USER' ? 'selected' : '' }}>User</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="name" placeholder="{{$data['user']->name}}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Surname</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="surname" placeholder="{{$data['user']->surname}}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="email" disabled value="{{$data['user']->email}}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" id=phone name="phone" placeholder="{{$data['user']->phone}}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Birthday</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="date" name="birthday" disabled placeholder="{{$data['user']->birthday}}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Height</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="number" name="height" placeholder="{{$data['userData']->user_data[0]['height']}}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Weight</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="number"  name="weight"placeholder="{{$data['userData']->user_data[0]['weight']}}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>BMR</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="number"  name="bmr" placeholder="{{$data['userData']->user_data[0]['bmr']}}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Gender</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select class="form-control" name="gender" disabled>
                                    <option value="">Select Gender</option>
                                    <option value="male" {{ $data['userData']->user_data[0]['gender'] == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $data['userData']->user_data[0]['gender'] ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Type</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select class="form-control" name="type" disabled>
                                    <option value="">Select Type</option>
                                    <option value="monthly" {{ $data['userData']->user_data[0]['type'] == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                    <option value="3_month" {{ $data['userData']->user_data[0]['type'] == '3_month' ? 'selected' : '' }}>3 Month</option>
                                    <option value="6_month" {{ $data['userData']->user_data[0]['type'] == '6_month' ? 'selected' : '' }}>6 Month</option>
                                    <option value="1_year"  {{ $data['userData']->user_data[0]['type'] == '1_year' ? 'selected' : '' }}>1 Year</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
@section('css') @endsection
@section('js') @endsection
