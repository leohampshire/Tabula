<div>
	<h1>{{$item->name}}</h1>
	<video width="969" height="450px" controls>
		<source src="{{asset('/uploads/archives/')}}/{{$item->path}}" type="video/mp4">
	</video>
	<p>{{$item->desc}}</p>
</div>
