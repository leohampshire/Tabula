<div class="box-w-shadow">
    <div class="box-title">
        <div class="row">
            <div class="col-xs-12">
                <h2>Notificações</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Tipo de Notificação</th>
                                <th>Descrição</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($notifications as $notification)

                            <tr>
                                <td>{{$notification->type_notification}}</td>
                                <td>{{$notification->desc_notification}}</td>
                                <td>{{$notification->created_at}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7y">Nenhum resultado encontrado</td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Tipo de Notificação</th>
                                <th>Descrição</th>
                                <th>Data</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>