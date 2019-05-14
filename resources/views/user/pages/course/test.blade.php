<div>
	<h1>{{$item->name}}</h1>
	<form action="{{route('course.test')}}" method="POST">
		{{csrf_field()}}
		<input type="hidden" name="item_id" value="{{$item->id}}">
	@forelse($items as $itm)
		@if($itm->course_item_types_id == 9)
		<div class="row">
			<div class="col-sm-12">
				<h3>{{$itm->name}}</h3>
			</div>
		</div>
			@forelse($itm->test as $question)
			<div class="row">
				<div class="col-sm-12">
					<div class="input-group">
	                    <span class="input-group-addon">
	                      <input type="radio" name="alternative" value="{{$question->id}}">
	                    </span>
	                    <label for="alternative" class="form-control">{{$question->desc}}</label>
	              	</div>
				</div>
			</div>
			@empty
			@endforelse
		@elseif($itm->course_item_types_id == 8)
		<div class="row">
			<div class="col-sm-12">
				<h3>{{$itm->name}}</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="input-group">
		            <span class="input-group-addon">
		              <input type="radio" name="true_false-{{$itm->id}}" value="1">
		            </span>
		            <label  class="form-control">Verdadeiro</label>
		        </div>
		        <div class="input-group">    
		            <span class="input-group-addon">
		              <input type="radio" name="true_false-{{$itm->id}}" value="0">
		            </span>
		            <label  class="form-control">Falso</label>
		      	</div>
				
			</div>
		</div>
		@elseif($itm->course_item_types_id == 7)
		<div class="row">
			<div class="col-sm-12">
				<h3>{{$itm->name}}</h3>
			</div>
		</div>
			@forelse($itm->test as $question)
			<div class="row">
				<div class="col-sm-12">
					<div class="input-group">
	                    <span class="input-group-addon">
	                      <input type="checkbox" name="alt_mult[]" value="{{$question->id}}">
	                    </span>
	                    <label for="alternative" class="form-control">{{$question->desc}}</label>
	              	</div>
				</div>
			</div>
			@empty
			@endforelse

		@elseif($itm->course_item_type_id == 10)
		<div class="row">
			<div class="col-sm-12">
				<h3>{{$itm->name}}</h3>
				<textarea rows="4" class="form-control" name="dissertative"></textarea>
			</div>
		</div>
		@endif
	@empty
	@endforelse
		<button class="btn btn-primary" type="submit">Enviar Prova</button>
	</form>
</div>