@extends('user.templates.default')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section class="p-top">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <ul class="macro-main">
                    @forelse($categories as $category)
                    <li class="macro-main__item">
                        <input type="checkbox" class="macro-main__checkbox--category" id="{{$category->id}}"
                            value="{{$category->id}}" name="macrotema">
                        <label for="{{$category->id}}" class="macro-main-label">{{$category->name}}</label>
                        <ul class="macro-sub--category" id="macrotema-sub-{{$category->id}}">
                            @forelse($category->parent_categories as $parent_category)
                            <li class="macro-sub__item">
                                <input type="checkbox" name="subtema" class="macro-main__checkbox"
                                    id="{{$parent_category->id}}" value="{{$parent_category->id}}"
                                    data-macro-main="{{$parent_category->category_id}}">
                                <label for="{{$parent_category->id}}">{{$parent_category->name}}</label>
                            </li>
                            @empty
                            @endforelse
                        </ul>
                    </li>
                    @empty
                    @endforelse
                </ul>
            </div>
            <form action="{{ route('search.single', ['id' => -1]) }}" method="get" enctype="multipart/form-data"
                style="display: none;">
                <?php
                if(isset($_GET['search_string'])){
                    $search_string = $_GET['search_string'];
                } else {
                    $search_string = '';
                }
                ?>
                <input id="search_string" class="input-tabula-white" name="search_string" type="text"
                    placeholder="Digite sua busca." value="{{$search_string}}">
                <button class="button-tabula-gray" type="submit">Buscar</button>
            </form>
            <div class="col-sm-8">
                <div class="row" id="search-results">
                    @forelse($courses as $course)
                    @if($course->avaliable == 2 || $course->price != null)
                    <a href="{{route('course.single', ['id' => $course->urn])}}">
                        <div class="col-sm-4">
                            <div class="course-box">
                                <div class="course-thumb">
                                    <img src="{{ asset('images/aulas')}}/{{$course->thumb_img}}" alt="Curso">
                                </div>
                                <div class="course-desc">
                                    <h3>{{$course->name}}</h3>
                                    <p><?php echo substr($course->desc, 0, 48); ?></p>
                                </div>
                                <div class="course-value">
                                    <span>@if($course->price == 0) Grátis @else R$ {{number_format($course->price,2,',','.')}}@endif</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endif
                    @empty
                    <div class="col-sm-6">
                        Não existem cursos das opções selecionadas.
                    </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')

<script type="text/javascript">
    $('.macro-main__item .macro-main__checkbox--category').change( function(){
        if($(this).prop('checked')){
            $( "#macrotema-sub-" + $(this).val() ).css( "display", "block" );
        } else {
            $( "#macrotema-sub-" + $(this).val() ).css( "display", "none" );
            $( "#macrotema-sub-" + $(this).val() ).find('input[type="checkbox"]').prop("checked", false);
        }
    })
</script>
@endsection