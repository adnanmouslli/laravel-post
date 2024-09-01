<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostsController extends Controller //StudlyCase
{

   





    public function firstAction(Request $request){ // camelCase

        $title = "firstAction";
        return view('welcome' , [
            "title" => $title , 
            "array" => ["adnan" , "omer" , "mohamad"]
            ]);

    }

    public function secondAction(Request $request){
        $title = "secondAction";
        return view("welcome" , [
            "title"=> $title ,
            "array"=> ["1" , "2" , "3"]
        ]);
    
    }

    public function index(){

        $postsData = Post::all(); // collection object

       // @dd($postsData);

        // $data = [
        //     ["id" => "1" , "title" => "hello" , "post_by" => "adnan" ,"create_at"=> "2015"] ,
            
        //     ["id" => "2", "title" => "what is your age" , "post_by" => "omer" ,"create_at"=> "2017"] ,
            
        //     ["id" => "3" , "title" => "why you dog ?" , "post_by" => "ahmad" ,"create_at"=> "2013"] ,
            
        //     ["id" => "4", "title" => "test title" , "post_by" => "samer" ,"create_at"=> "2011"] ,

        // ];
        return view("posts/index" , ["posts" => $postsData]);

    }


    // convention over configuration يعني بتقلك الفريم ورك سمي متل مابقلك وانا بعطيك طرق تسهل عليك الشغل 
    public function show(Post $post){ // type hinting (Route Model Binding)   route بال path var لازم المتحول نفس تسمية ال  
       
     

       // $singlePost = Post::findOrFail($id_post); // model object

       // $singlePost = Post::where("id", $id_post)->first(); // model object

       // $singlePost = Post::where("id", $id_post)->get(); // collection object

    //    if(is_null($singlePost)){ // to fix problem return query null

    //     return to_route("posts.index"); 
    //  }

       // @dd($singlePost -> title) ;

        // $data = [
        //     ["id" => "1" , "title" => "hello" ,"des" => "adnan"  ,"post_by" => "adnan" ,"create_at"=> "2015"] ,
            
        //     ["id" => "2", "title" => "what is your age" ,"des" => "omer", "post_by" => "omer" ,"create_at"=> "2017"] ,
            
        //     ["id" => "3" , "title" => "why you dog ?","des" => "ahmad" , "post_by" => "ahmad" ,"create_at"=> "2013"] ,
            
        //     ["id" => "4", "title" => "test title" ,"des" => "mohamad", "post_by" => "samer" ,"create_at"=> "2011"] ,
        // ];
        return view('posts.show' , ["singlePost" => $post]) ;
    }

    public function create(){
            
        $AllUser = User::all();
        
        
       // @dd($AllUser);    
            
        return view('posts.create' , ["users" => $AllUser]) ;

    }

    public function store(){

        // $data = $_POST ;
        // return $data ;

        $data = request()->all() ;
        $title = request()->title ;
        $des = request()->des ;
        $post_creator = request()-> post_creator ;



        // add the user data in database


       //////////// 1 //////////// 
        // $post = new Post();

        // $post->title = $title ;
        // $post->description = $des ;
        // $post->id_user = $post_creator ;

        // $post->save();

        //////////// 2 ////////////  
        
        

            $post = Post::create([
                "title"=> $title ,
                "description"=> $des ,
                "id_user"=> $post_creator ,

                "x" => "asdd" // ignore 
                //  الفريم ورك بتتجاهلو ومابتضيفو fillable طالما الحقل ليس موجود في ال 
            
            ]);



        return  to_route('posts.index');
    }

    public function edit($id_post){

        $users = User::all();
        
        $singlePost = Post::where("id", $id_post)->first(); // model object


        return view('posts.edit' , ['id_post' => $id_post , "users" => $users , 'post' => $singlePost]) ;
    }

    public function update($id_post){


        $data = request()->all() ;
        $title = request()->title ;
        $des = request()->des ;
        $post_creator = request()->post_creator ;

       // @dd($data);

       // update the user data in database

    //    Post::where('id', $id_post)
    //    ->update(['title' => $title , 'description' => $des , 'id_user' => $post_creator]) ;
    
        // or 
        $singlePost = Post::find($id_post) ;
        $singlePost-> update([
            'title' => $title ,
             'description' => $des ,
             'id_user' => $post_creator
        ]);


        return to_route('posts.show' , $id_post);

    }

    public function destroy(){

        // delete the post from database 


        // redirect to posts.index

        return to_route('posts.index') ;
    }
}
