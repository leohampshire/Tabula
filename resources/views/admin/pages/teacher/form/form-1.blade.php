


<form action="{{route('teacher.store')}}" method="POST">
{{csrf_field()}}
	<div class="row">
		<div class="col-sm-12">
			<input type="hidden" name="row" value="answer_first">
			<input type="radio" name="answer" value="1">resposta 1
			<input type="radio" name="answer" value="2">resposta 2
			<input type="radio" name="answer" value="3">resposta 3
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">

			<button type="Voltar" class="btn">Registrar</button>
		</div>
	</div>

</form>
