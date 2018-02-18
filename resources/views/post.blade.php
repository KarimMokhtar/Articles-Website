@extends('layouts.blog-post')


@section('content')

	<!-- Title -->
	<h1>{{$post->title}}</h1>

	<!-- Author -->
	<p class="lead">
	    by <a href="#">{{$post->user->name}}</a>
	</p>

	<hr>

	<!-- Date/Time -->
	<p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

	<hr>

	<!-- Preview Image -->
	<img class="img-responsive" src="{{$post->photo? $post->photo->path : ""}}" alt="">

	<hr>

	<!-- Post Content -->
	<p>{{$post->body}}</p>

	<hr>
	@if(Session::has('comment_message'))
		{{session('comment_message')}}

	@endif

	<!-- Blog Comments -->
@if(Auth::check())
	<!-- Comments Form -->
	<div class="well">
	    <h4>Leave a Comment:</h4>
	    {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}
	    	<input type="hidden" name="post_id" value="{{$post->id}}">
	    	<div class ='form-group'>
	    		{!! Form::label('body','Body:') !!}
	    		{!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
	    	</div>
	    	<div class ='form-group'>
	    		{!! Form::submit('Comment',['class'=>'btn btn-primary']) !!}
	    	</div>
	    {!! Form::close() !!}
	</div>
@endif
	<hr>

	<!-- Posted Comments -->
@if(count($comments) > 0)
	@foreach($comments as $comment)
		<!-- Comment -->
		<div class="media">
		    <a class="pull-left" href="#">
		        <img class="media-object" height = "64" width = "64"src="{{$comment->photo?$comment->photo : 'http://placehold.it/64x64' }}" alt="">
		    </a>
		    <div class="media-body">
		        <h4 class="media-heading">{{$comment->author}}
		            <small>{{$comment->created_at->diffForHumans()}}</small>
		        </h4>
		        {{$comment->body}}


		        <!-- Nested Comment -->
		        @if(count($comment->replies) > 0)
		        	<div class = "comment-reply-container" id = "nested-comment">
				        @foreach($comment->replies as $reply)
				        
				        	@if($reply->is_active == 1)
					        <div  class="media">
					            <a class="pull-left" href="#">
					        		<img class="media-object" height = "64" width = "64"src="{{$reply->photo?$reply->photo : 'http://placehold.it/64x64' }}" alt="">
					            </a>
					            <div class="media-body">
					                <h4 class="media-heading">{{$reply->author}}
					                    <small>{{$reply->created_at->diffForHumans()}}</small>
					                </h4>
					                {{$reply->body}}
					            </div>
					            
					        </div>
					        @endif
					    
				        @endforeach
			        </div>
		        @endif
		        {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply']) !!}
			    	<input type="hidden" name="comment_id" value="{{$comment->id}}">
			    	<div class ='form-group'>
			    		{!! Form::label('body','Body:') !!}
			    		{!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}
			    	</div>
			    	<div class ='form-group'>
			    		{!! Form::submit('Reply',['class'=>'btn btn-primary']) !!}
			    	</div>
			    {!! Form::close() !!}
		        <!-- End Nested Comment -->

		    </div>
		</div>
	@endforeach
@endif

@stop

@section('scripts')
	<script>


	</script>


@stop