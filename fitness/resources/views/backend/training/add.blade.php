@extends('backend.layout')
@section('content')
<section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add New User</h3>
            </div>
            <div class="box-body">
                <form action="{{route('training.addItem')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Name</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="name" value="" pattern="[a-zA-Z]{1,32}$" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea class="form-control" name="description"  required></textarea>
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
