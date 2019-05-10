@extends('user.templates.class')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section class="class-container">
	<div class="class-menu">
      	@foreach($course->course_item_chapters as $chapter)

		<div class="class-chapter">
			<p class="active"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> {{$chapter->name}}</p>
			<input id="{{$chapter->id}}" class="check-class" data-user_id="{{$auth->id}}" type="checkbox" data-url="{{route('course.checked')}}" name="check" checked>
			<label for="{{$chapter->id}}" class="label-check-class"></label>
		</div>

		<div class="class-items">
        	@foreach($chapter->course_item as $item)
	        	@if($item->course_items_parent == null)
				<div class="class-item">
					<a href="#" data-item="{{$item->id}}">
						<p class="active">{{$item->name}}</p>
					</a>
					<input id="{{$chapter->id}}-{{$item->id}}" class="check-class" data-user_id="{{$auth->id}}" data-url="{{route('course.checked')}}" type="checkbox" name="check" checked>
					<label for="{{$chapter->id}}-{{$item->id}}" class="label-check-class"></label>
				</div>
				@endif
			@endforeach
		</div>
		@endforeach
		
	</div>

	<div class="class-content">
	</div>
</section>

@stop