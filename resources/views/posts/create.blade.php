
@extends("layouts/app")


@section("content")


    @section("tital") create @endsection
    @section("sub_tital") all posts @endsection

    <form method="POST"  action="{{route('posts.store')}}" >
        @csrf

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tital</label>
            <input name="title"   class="form-control" id="exampleFormControlInput1" >
          </div>
          <div class="mb-5">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea name="des" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>



          <div class="mb-3">
            <select name="post_creator" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
              <option selected>select your name</option>

              @foreach ($users as $user)
              <option value="{{$user -> id}}" > {{$user -> name}}</option>
              @endforeach
             
              
               
              </select>
          </div>

          <div class="text-center">
            <button   class="btn btn-success">submit</button>
          </div>

    </form> 
 

   

      @endsection
   

    
