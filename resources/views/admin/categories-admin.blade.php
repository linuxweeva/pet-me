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


<ul>
	@foreach($categories as $category)
	<li>{{$category->title}}</li>
	@endforeach
</ul>

<form method="post" action="admin/category/add">
	@csrf
  <div class="form-group col-sm-4">
    <label for="exampleInputEmail1">Category name</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter category name">
  </div>
  <button type="submit" class="btn btn-primary">Add</button>
</form>

@endsection