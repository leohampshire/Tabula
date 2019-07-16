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
            <div class="form-group row dissertative">
                <div class="col-xs-12">
                    <label for="desc">Dissertativa</label>
                    <textarea class="form-control" rows="4" placeholder="Descrição" id="desc"
                        name="desc">{{$item->test[0]->desc}}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Confirmar</button>
    </div>
</form>