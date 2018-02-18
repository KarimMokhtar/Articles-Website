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
				<th colspan = '2'>View</th>
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
						<td>{{str_limit($post->body,30)}}</td>
						<td><a href="{{route('home.post',$post->id)}}">View Post</a></td>
						<td><a href="{{route('comments.show',$post->id)}}">View Comments</a></td>
						<td>{{$post->created_at->diffForHumans()}}</td>
						<td>{{$post->updated_at->diffForHumans()}}</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>

	<div class='row'>
		<div class='col-sm-6 col-sm-offset-5'>
			{{$posts->render()}}
		</div>
	</div>
@stop