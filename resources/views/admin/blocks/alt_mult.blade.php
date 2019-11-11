<form method="POST" action="{{route('admin.course.test.update')}}" enctype="multipart/form-data">
    <div class="modal-body">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$item->id}}">
        <div class="box-body">
            <div class="form-group row">
                <div class="col-xs-12">
                    <label for="name">Pergunta</label>
                    <textarea type="text" name="name" placeholder="Pergunta" class="form-control" id="name"
                              value="{{$item->name}}">{{$item->name}}</textarea>
                </div>
            </div>
            <div class="form-group row alt_mult">
                <div class="col-xs-12">
                    <label for="verdadeira">Multipla Escolha</label>
                    @for($i = 0; $i < 5; $i++) 
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="checkbox" @if(isset($item->test[$i])) @if($item->test[$i]->answer == 1
                                    ) checked @endif
                                    @endif name="verdadeira[]" value="{{$i}}">
                                </span>
                                <input type="text" class="form-control" @if(isset($item->test[$i]))
                                value="{{$item->test[$i]->desc}}" @endif name="afirmacao[]">
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Confirmar</button>
    </div>
</form>