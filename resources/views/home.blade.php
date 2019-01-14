@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container-fluid">

  <div class="row">

    <div class="col-lg-3">

        <h1 class="my-4">Pet me</h1>
        <div class="list-group">
        @foreach($categories as $category)
        <a href="/category/{{$category->id}}" class="list-group-item">{{$category->title}}</a>
        @endforeach
        </div>

    </div>
    <!-- /.col-lg-3 -->

    <div class="col-lg-9">

      <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img class="d-block img-fluid w-100" src="https://cdn.newsapi.com.au/image/v1/67a523605bca40778c6faaad93883a3b" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid w-100" src="https://fortunedotcom.files.wordpress.com/2017/08/164860646.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid w-100" src="https://c1.staticflickr.com/6/5568/14938727197_04c2bd7ba6_b.jpg" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <div class="row">
        @foreach( $pets as $pet )
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="{{ route( 'pet' , $pet -> id ) }}"><img class="card-img-top" src="https://d17fnq9dkz9hgj.cloudfront.net/uploads/2013/05/120251710-632x3531.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title text-center">
                  <a href="{{ route( 'pet' , $pet -> id ) }}">{{ $pet -> name }}</a>
                </h4>
                <h5>Տարիք: {{ $pet -> age }} ամսեկան</h5>
                <p class="card-text">{{ $pet -> about }}</p>
              </div>
              <div class="card-footer">
                <small class="text-muted"><i class=" fa-eye fa"></i> {{ $pet -> watched }}</small>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div id="pagination">
        {{ $pets -> appends( request() -> input() ) -> links() }}
      </div>
      <!-- /.row -->

    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
@endsection
