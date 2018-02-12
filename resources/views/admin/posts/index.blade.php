@extends('layouts.admin')



@section('content')

	<h1>Posts</h1>
	<table class="table">
	    <thead>
			<tr>
				
				<th>ID</th>
				<th>Photo</th>
				<th>Owner</th>
				<th>Category</th>
				<th>Title</th>
				<th>Status</th>
				<th>created</th>
				<th>updated</th>
			</tr>
		</thead>
		<tbody>
			@if($posts)
				@foreach($posts as $post)
					<tr>
						
						<td>{{$post->id}}</td>
						<td><img height = '50' src="{{$post->photo_id ? $post->photo->path : ''}}"></td>
						<td><a href="{{route('posts.edit',$post->id)}}">{{$post->user->name}}</a></td>
						<td>{{$post->category ? $post->category->name : 'uncategorized'}}</td>
						<th>{{$post->title}}</th>
						<td>{{$post->body}}</td>
						<td>{{$post->created_at->diffForHumans()}}</td>
						<td>{{$post->updated_at->diffForHumans()}}</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
@stop