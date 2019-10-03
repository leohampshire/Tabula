@extends('admin.templates.default')

@section('title', 'Mensagem')

@section('description', 'Descrição')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <h1>Prova {{$test->user ? $test->user->name : " aluno não localizado"}}</h1>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-body">
                        @forelse($item->course_item_parent as $itm)
                        @if($itm->course_item_types_id == 9)

                        <div class="row">
                            <div class="col-sm-12">
                                <label>{{$itm->name}}</label>
                            </div>
                        </div>
                        @forelse($itm->test as $question)
                        <?php $itemTest = $test->tests()->where('course_item_id', $itm->id)->first(); ?>

                        <div class="row row-item-question">
                            <div class="col-sm-12">
                                <div class="form-group {{$question->answer == 1 ? 'has-success' : ''}}">

                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="radio" name="alternative[{{$itm->id}}]"
                                                value="{{$question->answer}}"
                                                {{$question->id == $itemTest->answer ? "checked" : ""}}>
                                        </span>
                                        <label for="alternative" class="form-control">{{$question->desc}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        @endforelse
                        @elseif($itm->course_item_types_id == 8)
                        <?php $itemTest = $test->tests()->where('course_item_id', $itm->id)->first();?>
                        <div class="row">
                            <div class="col-sm-12">
                                <label>{{$itm->name}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                @php($answerItem = $itm->test()->first()->answer)
                                <div class="form-group @if($answerItem) {{$answerItem == 1 ? 'has-success' : ''}} @endif">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="radio" name="true_false[{{$itm->id}}]" value="1"
                                                @if($itemTest){{$itemTest->answer == "1" ? "checked" : ""}} @endif>
                                        </span>
                                        <label class="form-control">Verdadeiro</label>
                                    </div>
                                </div>
                                <div class="form-group {{$itm->test()->first()->answer == 0 ? 'has-success' : ''}}">

                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="radio" name="true_false[{{$itm->id}}]" value="0"
                                            @if($itemTest){{$itemTest->answer == "0" ? "checked" : ""}} @endif> 
                                        </span>
                                        <label class="form-control">Falso</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    
                        @elseif($itm->course_item_types_id == 7)
                        <div class="row">
                            <div class="col-sm-12">
                                <label>{{$itm->name}}</label>
                            </div>
                        </div>
                        @forelse($itm->test as $question)
                        <?php $itemTest = $test->tests()->where('course_item_id', $itm->id)->pluck('answer')->toArray(); ?>

                        <div class="row row-item-question">
                            <div class="col-sm-12">
                                <div class="form-group {{$question->answer == 1 ? 'has-success' : ''}}">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox" name="alt_mult[{{$itm->id}}][]"
                                                value="{{$question->answer}}" @if(in_array($question->id, $itemTest)
                                            ) checked @endif>
                                        </span>
                                        <label for="alternative" class="form-control">{{$question->desc}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        @endforelse
                        @elseif($itm->course_item_types_id == 10)
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <?php $itemTest = $test->tests()->where('course_item_id', $itm->id)->first(); ?>
                                    <label>{{$itm->name}}</label>
                                    <textarea rows="5" class="form-control"
                                        name="dissertative[{{$itm->id}}]">{{$itemTest->desc}}</textarea>
                                </div>
                            </div>
                        </div>
                        @endif
                        @empty
                        @endforelse
                    </div>
                    <div class="box-footer">
                        <a href="{{route('admin.notification.index')}}">
                            <button type="button" class="btn btn-secondary">Voltar</button>
                        </a>
                    </div>
                </div>
            </section>

    </section>
    <!-- /.content -->
</div>
<!-- /.row (main row) -->

</div>

@stop