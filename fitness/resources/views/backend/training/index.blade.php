@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Training List</h3>
            </div>
            <div class="box-body">
                <div class="col-md-12 bg-light text-right">
                    <button onclick="" class="btn btn-primary">Add New Training</button>

                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Training Name</th>
                        <th>Training Description</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['training'] as $training)
                        <tr>
                            <td>{{$training->id}}</td>
                            <td>{{$training->name}}</td>
                            <td>{{$training->description}}</td>
                            @if(Auth::user()->role == "ADMIN")
                                <td><a href="{{route('training.detail',['id' => $training->id])}}"><i class="fa fa-user"></i></a></td>
                                <td><a href="{{route('training.edit',['id' => $training->id])}}"><i class="fa fa-pencil-square"></i></a></td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script type="text/javascript">

        $(function (){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".fa-trash-o").click(function () {
                const destroy_id = $(this).attr('id');

                alertify.confirm('Silme işlemini onaylayın!', 'Bu işlem geri alınamaz',
                    function () {
                        location.href = "/training/delete/" + destroy_id;
                    },
                    function () {
                        alertify.error('Silme işlemi iptal edildi')
                    }
                )

            });

        });

    </script>
@endsection
@section('css') @endsection
@section('js') @endsection
