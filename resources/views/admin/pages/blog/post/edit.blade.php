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
            <form method="POST" action="{{route('admin.post.blog.tag', ['post', $post])}}"
                enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}

                    <div class="box-body">
                    <div class="col-md-6">
              <div class="form-group" data-select2-id="24">
                <label>Multiple</label>
                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                  <option data-select2-id="25">Alabama</option>
                  <option data-select2-id="26">Alaska</option>
                  <option data-select2-id="27">California</option>
                  <option data-select2-id="28">Delaware</option>
                  <option data-select2-id="29">Tennessee</option>
                  <option data-select2-id="30">Texas</option>
                  <option data-select2-id="31">Washington</option>
                </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="8" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-selection__choice" title="California" data-select2-id="46"><span class="select2-selection__choice__remove" role="presentation">×</span>California</li><li class="select2-selection__choice" title="Tennessee" data-select2-id="47"><span class="select2-selection__choice__remove" role="presentation">×</span>Tennessee</li><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
              </div>
              <!-- /.form-group -->
              <div class="form-group" data-select2-id="13">
                <label>Disabled Result</label>
                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                  <option selected="selected" data-select2-id="11">Alabama</option>
                  <option data-select2-id="17">Alaska</option>
                  <option disabled="disabled" data-select2-id="18">California (disabled)</option>
                  <option data-select2-id="19">Delaware</option>
                  <option data-select2-id="20">Tennessee</option>
                  <option data-select2-id="21">Texas</option>
                  <option data-select2-id="22">Washington</option>
                </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="10" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-b51a-container"><span class="select2-selection__rendered" id="select2-b51a-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
              </div>
              <!-- /.form-group -->
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
$(document).ready(function() {
    $('.tag-select').select2();
});
</script>
@endsection