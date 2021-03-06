@if (isset($courses))
@if (count($courses) > 0)
@foreach($courses as $course)
@if($course->avaliable == 2)
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
@endforeach
@else
Não existem cursos das opções selecionadas.
@endif
@else
Selecione um macrotema para pesquisar ou escreva um nome de curso.
@endif