@extends('admin.templates.default')

@section('title', 'Atualizar Post')

@section('description', 'Descrição')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <h1>Atualizar Post</h1>
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
            <section class="col-lg-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Dados</h3>
                    </div>
                    <form method="POST" action="{{route('admin.post.blog.update')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$post->id}}">
                        <div class="box-body">
                            <div class="form-group  row">
                                <div class="col-xs-12">
                                    <label for="cover">Capa</label>
                                    <input class="form-control" type="file" name="cover">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <label for="name">Titulo</label>
                                    <input class="form-control" type="text" name="name" placeholder="Titulo do post"
                                        value="{{ $post->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <label for="content">Conteúdo</label>
                                    <textarea class="form-control tinyeditor" rows="6" name="content"
                                        placeholder="Escrever Conteúdo">{{ $post->meta_title }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <label for="meta_title">Meta Title</label>
                                    <input class="form-control" type="text" name="meta_title"
                                        placeholder="Definir Meta Title" value="{{ $post->meta_title }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea name="meta_description" id="meta_description" class="form-control"
                                        rows="6">{{$post->meta_description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-6">
                                    <label for="keywords">KeyWord</label>
                                    <input class="form-control" type="text" name="keywords"
                                        placeholder="Definir KeyWord" value="{{ $post->keywords }}">
                                </div>
                                <div class="col-xs-6">
                                    <label for="urn">URN</label>
                                    <input class="form-control input-urn" type="text" name="urn"
                                        placeholder="Definir URN" value="{{ $post->urn }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <label for="category_id">Categoria do Blog</label>
                                    <select name="category_id" class="form-control">
                                        <option selected disabled>SELECIONE...</option>
                                        @forelse($categories as $category)
                                        <option value="{{$category->id}}" @if($category->id == $post->category_id)
                                            selected @endif>{{$category->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                            <a href="{{route('admin.post.blog.index')}}">
                                <button type="button" class="btn btn-secondary">Voltar</button>
                            </a>
                        </div>
                    </form>
                </div>
            </section>
            <section class="col-lg-4">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="box-title">TAGS</h3>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn btn-success act-tag" style="float:right;"><i class="fa fa-plus"
                                        aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($post->tags as $tag)
                                <tr>
                                    <td>{{$tag->name}}</td>
                                    <td>
                                        <a href="{{ route('admin.post.blog.tag.delete', ['tag' => $tag, 'post' => $post])}}"
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
                        </table>
                    </div>
                </div>
            </section>

        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>

@stop
@section('modals')
<!--Criar Capitulo-->
<div class="modal fade" id="includeTag">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Incluir Tag</h4>
            </div>
            <form method="POST" action="{{route('admin.post.blog.tag', ['post' => $post])}}"
                enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}

                    <div class="box-body">
                        <div class="form-group row">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" name="name" id="name" onkeyup="upperCase(this)">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--/.Criar Capitulo-->
@endsection
@section('scripts')
<script type="text/javascript">
$('.act-tag').on('click', function(e) {
    e.preventDefault();
    $('#includeTag').modal('show');
});

function upperCase(letter) {
    upper = letter.value.toUpperCase();
    letter.value = upper;
}
</script>
@endsection