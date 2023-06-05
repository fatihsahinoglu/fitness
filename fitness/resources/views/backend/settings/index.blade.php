@extends('backend.layout')
@section('content')
<section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Settings</h3>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Description</th>
                        <th>Content</th>
                        <th>Key</th>
                        <th>Type</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="sortable">
                    @foreach($data['adminSettings'] as $adminSettings)
                    <tr id="item-@php echo $adminSettings->id @endphp">
                        <td>{{$adminSettings->id}}</td>
                        <td class="sortable">{{$adminSettings->description}}</td>
                        <td>{{$adminSettings->content}}</td>
                        <td>{{$adminSettings->key}}</td>
                        <td>{{$adminSettings->type}}</td>
                        <td><a href="{{route('settings.edit',['id' => $adminSettings->id])}}"><i class="fa fa-pencil-square"></i></a></td>
                        <td>
                            @if($adminSettings ->delete)
                                <a href="javascript:void(0)"><i id="@php echo $adminSettings->id @endphp" class="fa fa-trash-o"></i></a>
                            @endif
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
                    location.href = "/admin/settings/delete/" + destroy_id;
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
