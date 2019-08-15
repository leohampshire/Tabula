<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <h1>Alunos</h1>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$item->name}}</h3>
                    </div>
                    <div class="box-body table-responsive">

                        <div>
                            @forelse($items as $itm)
                            @php($answer = $answers->where('course_item_id', $itm->id)->first())
                            @if($itm->course_item_types_id == 9)
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>{{$itm->name}}</p>
                                </div>
                            </div>
                           

                            @forelse($itm->test as $question)
                            <div class="row row-item-question">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="radio" name="alternative[{{$itm->id}}]" @if($answer->answer == $question->answer) checked @endif
                                                value="{{$question->answer}}">
                                        </span>
                                        <p for="alternative" class="form-control">{{$question->desc}}</p>
                                    </div>
                                </div>
                            </div>
                            @empty
                            @endforelse
                            @elseif($itm->course_item_types_id == 8)
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>{{$itm->name}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="radio" name="true_false[{{$itm->id}}]" value="1">
                                        </span>
                                        <p class="form-control">Verdadeiro</p>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="radio" name="true_false[{{$itm->id}}]" value="0">
                                        </span>
                                        <p class="form-control">Falso</p>
                                    </div>

                                </div>
                            </div>
                            @elseif($itm->course_item_types_id == 7)
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>{{$itm->name}}</p>
                                </div>
                            </div>
                            @forelse($itm->test as $question)
                            <div class="row row-item-question">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox" name="alt_mult[{{$itm->id}}][]"
                                                value="{{$question->answer}}">
                                        </span>
                                        <label for="alternative" class="form-control">{{$question->desc}}</label>
                                    </div>
                                </div>
                            </div>
                            @empty
                            @endforelse
                            @elseif($itm->course_item_types_id == 10)
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>{{$itm->name}}</p>
                                    <textarea readonly rows="4" class="form-control"
                                        name="dissertative[{{$itm->id}}]">{{$answer->desc}}</textarea>
                                </div>
                            </div>
                            @endif
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </section>

            <section class="col-lg-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Dados</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Perguntas</th>
                                    <th>Respostas corretas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tests as $test)
                                <tr>
                                    <td>{{$test->answers}}</td>
                                    <td>{{$test->correct}}</td>
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

    </section>
    <!-- /.content -->
</div>
<!-- /.row (main row) -->