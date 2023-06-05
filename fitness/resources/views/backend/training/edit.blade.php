@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit</h3>
            </div>
            <div class="box-body">
                <form action="{{route('users.update', ['id'=> $data['user']->id])}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Training Name</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="name" value="" pattern="[a-zA-Z]{1,32}$" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Training Description</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea class="form-control" name="description"  required></textarea>
                            </div>
                        </div>
                    </div>
                    <div align="right" class="box-footer">
                        <button type="submit" class="btn btn-success">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
@section('css') @endsection
@section('js') @endsection
