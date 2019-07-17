@extends('user.templates.class')

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
						<div class="class-item class-item-complementar">
							<p>{{$item->name}}</p>
						</div>
					</a>
					@else
					<a href="#" class="btn-class-item" data-item="{{$item->id}}" data-url="{{route('course.getclass')}}">
						<div class="class-item">
							<p id="{{$item->id}}">{{$item->name}}</p>
							<input id="{{$chapter->id}}-{{$item->id}}" class="check-class" data-user_id="{{$auth->id}}"
								data-url="{{route('course.checked')}}" data-course_id="{{$course->id}}" type="checkbox"
								name="check" 
								
								@if($item->item_checked()->where('user_id', $auth->id)->first() && $item->item_checked()->where('user_id', $auth->id)->first()->pivot->course_item_status_id == 1)
								checked @endif>
								
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
@section('scripts')
<script type="text/javascript">

</script>
@endsection