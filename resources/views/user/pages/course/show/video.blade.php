<div>
	<h1>{{$item->name}}</h1>
	@if(strpos($item->path, 'vimeo'))
	<iframe src="{{$item->path}}" width="100%" height="350px" frameborder="0" title="" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	@else
	<video class="afterglow" id="teste" controlsList="nodownload" oncontextmenu="return false;" controls style="width:100%; height: 350px;">
		<source src="{{asset('/uploads/archives/')}}/{{$item->path}}" type="video/mp4">
	</video>
	@endif
	<p><?php echo $item->desc ?></p>
	
</div>
	
