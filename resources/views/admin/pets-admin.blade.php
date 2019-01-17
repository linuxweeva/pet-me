@extends('layouts.app')
@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div>
	<form action="/admin/pet/add" method="post">
		@csrf
		<div class="form-group">
			<label>Pet name</label>
			<input class="form-control" type="text" name="name">		
		</div>
		<div class="form-group">
			<label>Category</label>
			<select class="form-control" name="category_id">
				@foreach($categories as $category)
				<option value="{{$category->id}}">{{$category->title}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label>Age</label>
			<input type="number" name="age" class="form-control">	
		</div>
		<div class="form-group">
			<label>Description</label>
<<<<<<< HEAD
			<textarea class="form-control" name="about" placeholder="Add some description for pet..."></textarea>
=======
			<textarea class="form-control" name="about">Add some description for pet...</textarea>		
>>>>>>> ef9b37d13eda8e2a90e59d487c82a30be4d046b9
		</div>
		<button class="btn btn-primary" type="submit">Submit</button>
	</form>
</div>

@endsection