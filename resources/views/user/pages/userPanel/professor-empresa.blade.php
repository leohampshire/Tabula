<div class="box-w-shadow">
    <div class="box-title">
        <div class="row">
            <div class="col-xs-12">
                <h2>Meus professores</h2>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-sm-3">
            <a href="#" class="teacher-include" data-id="{{$auth->company->id}}">
                <div class="add-course-box">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                </div>
            </a>
        </div>
        @foreach($teachers as $teacher)
        <div class="col-sm-3">
            <div class="course-box">
                <div class="course-thumb">
                    <img src="{{ asset('images/profile')}}/{{$teacher->avatar}}" alt="Curso">
                </div>
                <div class="course-desc">
                    <h3>{{$teacher->name}}</h3>
                </div>
                <div class="course-access">
                    <a href="{{route('user.teacher.delete', ['id' => $teacher->id])}}"
                        class="act-delete"><span>REMOVER</span></a>
                    <a href="{{route('teacher', ['id' => $teacher->id])}}"><span>VER</span></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>