<form method="POST" action="{{route('admin.course.test.update')}}" enctype="multipart/form-data">
    <div class="modal-body">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$item->id}}">
        <div class="box-body">
            <div class="form-group row">
                <div class="col-xs-12">
                    <label for="name">Pergunta</label>
                    <input type="text" name="name" placeholder="Pergunta" class="form-control" id="name"
                        value="{{$item->name}}">
                </div>
            </div>
            <div class="form-group row truefalse">
                <div class="col-xs-12">
                    <label for="desc">Verdadeiro ou Falso:</label>
                    <label class="radio-inline"><input type="radio" @if(isset($item->test[0]))
                        @if($item->test[0]->answer == 1
                        ) checked @endif
                        @endif name="trueFalse" value="1">Verdadeira</label>
                    <label class="radio-inline"><input type="radio" @if(isset($item->test[0]))
                        @if($item->test[0]->answer == 0
                        ) checked @endif
                        @endif name="trueFalse" value="0">Falsa</label>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Confirmar</button>
    </div>
</form>