@extends('layouts.admin')



@section('content')


	

	<div class = 'col-sm-6'> 
		<h1>Categories</h1>
		{!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store']) !!}

			<div class='form-group'>
				{!! Form::label('name','Name:') !!}
				{!! Form::text('name',null,['class'=>'form-control']) !!}

			</div>
			<div>
				{!! Form::submit('Creat Category',['class'=>'btn btn-primary']) !!}

			</div>


		{!! Form::close() !!}
	</div>


	<div class = 'col-sm-6'> 
		@if($categories)
			<table class='table'>
				<thead>

					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Created Date</th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $category)
					<tr>
						<td>{{$category->id}}</td>
						<td><a href="{{route('categories.edit',$category->id)}}">{{$category->name}}</a></td>
						<td>{{$category->created_at? $category->created_at->diffForHumans() : 'No Date'}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@endif
	</div>

@stop