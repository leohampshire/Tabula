<div class="box-title">
	<div class="row">
		<div class="col-xs-12">
			<h2>Pedido #{{$order->transaction_id}}</h2>
			<h3>Status: {{$order->statusOrder($order->id)}}</h3>
			<h3>Total: R$ {{number_format($order->total($order->id),2, ',', '.')}}</h3>
		</div>
	</div>
	@forelse($order->items as $item)
	<div class="row">

		<div class="col-xs-12">
			<h4>Curso: {{$item->course->name}}</h4>
			<h4>Valor: R$ {{number_format($item->value,2,',','.')}}</h4>
			<h4>Desconto: R$ {{number_format($item->discount,2,',','.')}}</h4>
			<h4>Autor: {{$item->author($item->type)->first()->name}}</h4>
		</div>
	</div>
	<hr>
	@empty
	@endforelse
</div>