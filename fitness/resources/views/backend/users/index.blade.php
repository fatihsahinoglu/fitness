@extends('backend.layout')
@section('content')
<section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">User List</h3>
            </div>
            <div class="box-body">
                <div class="col-md-12 bg-light text-right">
                    <button onclick="window.location.href = '{{route('users.add')}}';" class="btn btn-primary">Add New User</button>

                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Role</th>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="sortable">
                    @foreach($data['users'] as $users)
                    <tr id="item-@php echo $users->id @endphp">

                        <td>{{$users->id}}</td>
                        <td>{{$users->role}}</td>
                        <td class="sortable">{{$users->name}} {{$users->surname}}</td>
                        <td>{{$users->email}}</td>
                        <td>{{$users->phone}}</td>

                        <td><a href="{{route('users.detail',['id' => $users->id])}}"><i class="fa fa-user"></i></a></td>

                        <td> @if($users->role != "ADMIN")<a href="{{route('users.edit',['id' => $users->id])}}"><i class="fa fa-pencil-square"></i></a> @endif

                        </td>

                        <td>
                            <a href="javascript:void(0)"><i id="@php echo $users->id @endphp" class="fa fa-trash-o"></i></a>
                        </td>
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

        $('#sortable').sortable({
            revert: true,
            handle: ".sortable",
            stop: function (event, ui) {
                var data = $(this).sortable('serialize');
                $.ajax({
                    type: "POST",
                    data: data,
                    url: "{{route('settings.sortable')}}",
                    success: function (msg) {
                        // console.log(msg);
                        if (msg) {
                            alertify.success("İşlem Başarılı");
                        } else {
                            alertify.error("İşlem Başarısız");
                        }
                    }
                });

            }
        });
        $('#sortable').disableSelection();

        $(".fa-trash-o").click(function () {
            const destroy_id = $(this).attr('id');

            alertify.confirm('Silme işlemini onaylayın!', 'Bu işlem geri alınamaz',
                function () {
                    location.href = "/users/delete/" + destroy_id;
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
