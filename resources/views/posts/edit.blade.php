
@extends("layouts.app")
@section("content")


    @section("tital") edit @endsection
    @section("sub_tital") all posts @endsection

    <form method="POST"  action="{{route('posts.update' , $id_post)}}" >
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input name="title"   class="form-control" value="{{$post -> title}}" id="exampleFormControlInput1" >
          </div>
          <div class="mb-5">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea name="des" class="form-control"  id="exampleFormControlTextarea1" rows="3">{{$post -> description}}</textarea>
          </div>


          <div class="mb-3">
            <select name="post_creator" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
            
              @foreach ($users as $user)
              <option value="{{$user -> id}}" > {{$user -> name}}</option>
              @endforeach

              </select>
          </div>

          <div class="text-center">
            <button   class="btn btn-primary">update</button>
          </div>

    </form> 
 

   

      @endsection
   

    
