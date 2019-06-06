@extends('admin.templates.preview')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section class="class-container">
	<div class="class-menu">
      	@foreach($course->course_item_chapters as $chapter)

		<div class="class-chapter">
			<p class="active"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> {{$chapter->name}}</p>
			
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