<div class="box-w-shadow">
    <div class="box-title">
        <div class="row">
            <div class="col-xs-12">
                <h2>Prova {{$item_parent->name}}</h2>
            </div>
        </div>
    </div>
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Itens prova</h3>
                        <div class="box-tools">
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary act-question" data-course_id="{{$course->id}}"
                        data-chapter_id="{{$item_parent->course_item_chapter->id}}"
                        data-item="{{$item_parent->id}}">INCLUIR QUESTÃO</button>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Pergunta</th>
                                    <th>Tipo</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($items as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->course_item_type->name}}</td>
                                    <td>
                                        <a href="#" title="Editar" class="act-list act-edit-chapter"
                                            data-name="{{$item->name}}" data-desc="{{$item->desc}}"
                                            data-id="{{$item->id}}">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.course.item.delete', ['id' => $item->id])}}"
                                            title="Excluir" class="act-list act-delete">
                                            <i class="fa fa-ban" aria-hidden="true"></i>
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
                                    <th>Tipo</th>
                                    <th>Ações</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </section>
        </div>
        <!-- /.row (main row) -->
    </section>
</div>