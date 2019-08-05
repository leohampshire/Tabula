@extends('user.templates.default')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section id="post-blog">
    <div class="container">
        <div class="box-w-shadow">
            <div class="row">
                <div class="col-sm-12">
                    <img id="post-blog-img" src="{{asset('uploads/archives')}}/{{$post->cover}}">
                </div>
            </div>
        </div>
        <div class="box-w-shadow">
            <div class="row">
                <div class="col-sm-12">
                <h2>{{$post->name}}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?php echo $post->content; ?>
                </div>
            </div>
        </div>
    </div>
</section>

@stop