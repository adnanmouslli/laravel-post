
    @extends("layouts.app")
    @section("content")



    
        @section("tital") index @endsection
        @section("sub_tital") all posts @endsection

        <div class="text-center">
            <a href="{{route('posts.create')}}"  type="button"  class="btn btn-primary">create post</a>
        </div>


        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">post by</th>
                <th scope="col">created at</th>
                <th scope="col">actions</th>

              </tr>
            </thead>

            <tbody>
                
 

              @foreach ($posts as $post)

              <tr>
                <th scope="row">{{$post -> id}}</th>
                <td>"{{$post -> title}}"</td>
                <td>{{$post -> id_user}}</td>
                <td>{{$post -> created_at}}</td>
                <td>
                          {{-- /posts/{{$post['id']}} --}}
                        <a href="{{route('posts.show' , $post -> id)}}" class="btn btn-info">view</a>
                        
                        <a href="{{route('posts.edit' , $post -> id)}}" class="btn btn-primart">edit</a>
                        
                      <form style="display: inline" method="POST" action="{{route('posts.destroy' , $post -> id)}}">  
                        @csrf
                        @method('DELETE')

                        <button  class="btn btn-danger">delete</button>
                      </form>
                </td>

                  
              @endforeach  

             
        
            </tbody>
            
          </table>

          @endsection
       

        
