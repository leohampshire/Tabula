<div class="box-w-shadow">
    <div class="box-title">
        <div class="row">
            <div class="col-xs-6">
                <h2>Alunos</h2>
            </div>
            <div class="col-sm-6">
                <button class="btn-header act-student" data-id="{{$course->id}}">INCLUIR ALUNO</button>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Dados</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Progesso</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($course->students as $student)
                                <?php
                if($course->total_class != 0){
                  $progress = ($student->pivot->progress / $course->total_class)*100;
                }else{
                  $progress = 0;
                }
                ?>
                                <tr>
                                    <td>{{$student->name}}</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: {{$progress}}%;">{{$progress}}%
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('user.course.restart', ['id' => $student->id, 'course_id' => $course->id])}}"
                                            title="Reiniciar" class="act-list act-delete">
                                            <i class="fa fa-refresh" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('user.course.student-certificate', ['id' => $student->id, 'course_id' => $course->id])}}"
                                            title="Gerar Certificado" class="act-list">
                                            <i class="fa fa-certificate" aria-hidden="true"></i>
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
                                    <th>Progesso</th>
                                    <th>Ações</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </section>
</div>