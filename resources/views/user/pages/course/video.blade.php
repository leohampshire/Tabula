<div>
	<h1>{{$item->name}}</h1>
	<video class="afterglow" id="teste" controlsList="nodownload" oncontextmenu="return false;" controls style="width:100%; height: 350px;">
		<source src="{{asset('/uploads/archives/')}}/{{$item->path}}" type="video/mp4">
	</video>
	<p>{{$item->desc}}</p>
</div>
	
