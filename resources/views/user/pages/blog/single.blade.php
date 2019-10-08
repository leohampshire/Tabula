@extends('user.templates.default')

@section('title', $post->meta_title)

@section('description', $post->meta_description)

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
            <br>
            <div class="row">
                <div class="col-sm-12">
                    @forelse($post->tags as $tag)
                    <a href="{{route('blog.tag', ['slug' => $tag->slug])}}" class="tag-blog">{{$tag->name}}</a>
                    @empty
                    @endforelse
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <?php echo $post->content; ?>
                </div>
            </div>
            <br>
        </div>

        <div class="box-w-shadow">
            <div class="row">
                <div class="col-sm-12">
                    <h3>Comentários</h3>
                    @if(auth()->guard('user')->user())
                    <form action="{{route('blog.comment')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="user_id" value="{{auth()->guard('user')->user()->id}}">
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="content">Comentar</label>
                                    <textarea name="content" id="content" class="form-control" rows="5"
                                        placeholder="Deixe um comentário"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="submit">Comentar</button>
                            </div>
                        </div>
                    </form>
                    @endif
                    <div style="margin-top: 16px;"> 
                        @forelse($post->comments as $comment)
                        <p><small>Autor: {{$comment->user->name}}</small></p>
                        <p>{{$comment->content}}</p>
                        <hr>
                        @empty
                        <p>Sem Comentários</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop