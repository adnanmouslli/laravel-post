@extends("layouts.app")

@section("content")
@section("tital") show @endsection
@section("sub_tital") home @endsection


  <div class="card mt-4">
    <div class="card-header">
      post info
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$singlePost['title']}}</h5>
      <p class="card-text">{{$singlePost['des']}}</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>

  <div class="card mt-4">
    <div class="card-header">
      post info
    </div>
    <div class="card-body">
      <h5 class="card-title">Special title treatment</h5>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>

@endsection