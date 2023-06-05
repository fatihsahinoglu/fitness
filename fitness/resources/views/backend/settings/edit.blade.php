@extends('backend.layout')
@section('content')
<section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Settings</h3>
            </div>
            <div class="box-body">
                <form action="{{route('settings.update', ['id'=> $settings->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Description</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" readonly name="description" value="{{$settings->description}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Content</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="content" value="{{$settings->content}}">
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
