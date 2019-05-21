@extends('user.templates.class')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section class="class-container">
	<div class="class-menu">
      	@foreach($course->course_item_chapters as $chapter)

		<div class="class-chapter">
			<p class="active"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> {{$chapter->name}}</p>
			<input id="{{$chapter->id}}" class="check-class"  data-user_id="{{$auth->id}}" type="checkbox" data-url="{{route('course.checked')}}" name="check" checked>
			<label for="{{$chapter->id}}" class="label-check-class"></label>
		</div>

		<div class="class-items">
        	@foreach($chapter->course_item as $item)
	        	@if($item->course_items_parent == null)
	        		@if($item->course_item_types_id == 5)
	        		<a href="{{asset('uploads/archives')}}/{{$item->path}}" download="{{$item->name}}" class="btn-class-item">
						<div class="class-item-complementar" >
							<p class="active">{{$item->name}}</p>
						</div>
					</a>
	        		@else
		        	<a href="#" class="btn-class-item" data-item="{{$item->id}}" data-url="{{route('course.getclass')}}" >
						<div class="class-item" >
							<p class="active">{{$item->name}}</p>
							<input id="{{$chapter->id}}-{{$item->id}}" class="check-class" data-user_id="{{$auth->id}}" data-url="{{route('course.checked')}}" data-course_id="{{$course->id}}" type="checkbox" name="check">
							<label for="{{$chapter->id}}-{{$item->id}}" class="label-check-class"></label>
						</div>
					</a>
	        		@endif
				@endif
			@endforeach
		</div>
		@endforeach
		
	</div>

	<div class="class-content" id="content">
	</div>
</section>

@stop