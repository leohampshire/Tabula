@extends('user.templates.default')

@section('title', 'Página em desenvolvimento')

@section('description', 'Descrição')

@section('content')

<section class="blog">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                @forelse($posts as $post)
                <div class="box-w-shadow">
                    <div class="row">
                        <div class="col-sm-4 col-blog">
                            <img src="{{ asset('uploads/archives')}}/{{$post->cover}}" alt="Blog">
                        </div>
                        <div class="col-sm-8">
                            <div class="box-blog-conteudo">
                                <p class="blog-categories">{{$post->category->name}}</p>

                                <?php
                                setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                                date_default_timezone_set('America/Sao_Paulo');
                                ?>
                                <h4>{{$post->name}}</h4>
                                <p class="data-news"><i class="fa fa-calendar" aria-hidden="true"></i>
                                    {{strftime('%d de %B de %Y', strtotime($post->created_at))}}</p>
                                    <br>
                                <p class="summary-news"><?php echo substr($post->content,0, 150) ?> ...</p>
                                <button
                                    onclick="window.location.href ='{{route('blog.single', ['urn' => $post->urn])}}'" style="margin-top: 12px;">Leia
                                    mais</button>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="row">
                    <div class="col-sm-12">
                    <h2>Não existem posts cadastrado.</h2>
                    </div>
                </div>
                @endforelse
            </div>
            <div class="col-sm-4">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-w-shadow">
                            <!--
                             <a href="{{route('blog.index')}}">Limpar</a>
                            -->
                            <div class="title-box">
                                <h4><i class="fa fa-list" aria-hidden="true"></i> Categorias</h4>
                            </div>
                            <div class="content-sidebar sidebar-blog">

                                @forelse($categories as $category)
                                <ul>
                                    <a href="{{route('blog.category', ['urn' => $category->urn])}}">
                                        <li>
                                            <i class="fa fa-newspaper-o" aria-hidden="true"></i> {{$category->name}}
                                        </li>
                                    </a>
                                </ul>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection