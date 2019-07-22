<div>
	<h1>{{$item->name}}</h1>
	<audio width="969" height="450px" controls>
		<source src="{{asset('/uploads/archives/')}}/{{$item->path}}" type="audio/mp3">
	</audio>
	<p><?php echo $item->desc ?></p>
</div>