<div class="box-title">
	<div class="row">
		<div class="col-xs-12">
			<h2>Meus Pedidos</h2>
		</div>
	</div>
</div>
<div class="row">
	@forelse($orders as $order)
	<div class="col-sm-6">
		<div class="course-box">
			<div class="course-thumb">
				<img src="{{ asset('images/aulas')}}/course.jpg" alt="Pedido">
			</div>
			<div class="course-desc">
				<h3>Pedido: #{{$order->transaction_id}}</h3>
				<p>Status: {{$order->statusOrder($order->id)}}</p>
				<p>Total: R$ {{number_format($order->total($order->id),2, ',', '.')}}</p>
			</div>
			<div class="course-access">
				<a href="#" class="this-order" data-url="{{route('user.order', ['id' => $order->id])}}"><span>VISUALIZAR</span></a>
			</div>
		</div>
	</div>
	@empty
	<div class="col-xs-12">
		<p>Não possui nenhum pedido</p>
	</div>
	@endforelse
	
</div>