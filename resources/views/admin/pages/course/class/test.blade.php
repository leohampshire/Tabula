@extends('admin.templates.default')

@section('title', 'Editar Curso')

@section('description', 'Descrição')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-sm-4">
                <h1>Prova: {{$item_parent->name}}</h1>
            </div>
            <div class="col-sm-8">
                <button class="btn btn-header act-question">INCLUIR QUESTÃO</button>
            </div>
        </div>
    </section>

    @if(session()->has('success'))
    <section class="content-header">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-sm-12">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{session('success')}}
                </div>
            </section>
        </div>
    </section>
    @endisset
    @if(session()->has('warning'))
    <section class="content-header">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-sm-12">
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{session('warning')}}
                </div>
            </section>
        </div>
    </section>
    @endisset

    @if ($errors->any())
    <div class="content-header">
        @foreach ($errors->all() as $error)
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ $error }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Itens da Prova</h3>
                        <div class="box-tools">
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Pergunta</th>
                                    <th>Tipo</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($items as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->course_item_type->value}}</td>
                                    <td>
                                        <a href="#" title="Editar" class="act-list act-edit-test"
                                            data-item="{{$item->id}}">
                                            <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.course.item.delete', ['id' => $item->id])}}"
                                            title="Excluir" class="act-list act-delete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7y">Nenhum resultado encontrado</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nome</th>
                                    <th>Tipo</th>
                                    <th>Ações</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </section>
        </div>
        <!-- /.row (main row) -->
    </section>
</div>
<!-- /.row (main row) -->

@stop
@section('modals')
<!--Incluir questão-->
<div class="modal fade" id="questionEditModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Editar Questão</h4>
            </div>
            <div class="content">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--/.Incluir questão-->
@endsection
@section('scripts')
<script type="text/javascript">
$('.act-edit-test').on('click', function(e) {
    e.preventDefault();
    var item = $(this).data('item');
    getItem(item);
});

function getItem(item) {
    $.ajax({
        url: "{{route('edit-item')}}",
        type: 'GET',
        data: {
            item: item,
        },
        beforeSend: function() {
        },
        success: function(data) {
          $('#questionEditModal .content').html(data);
        $('#questionEditModal').modal('show');

        },
        error: function(e) {
            console.log(e);
        }
    });
}

</script>
@endsection