<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
    public function index(User $user){

      $posts= Post::where('user_id',$user->id)->paginate(2);

      

        return view('dashboard',[
          'user'=>$user,
          'posts'=>$posts
        ]);

    }


    public function create()
    {//nos prmite tener el formulario tipo GET para mostrarlo

      
      return view('posts.create'); 
    }


    public function store(Request $request)
    {// nos permite guardar la inforamcion POST

      
     //dd('Creando la Publicacion'); 

      $this->validate($request,[

        'titulo' => 'required|max:255',
        'description'=>'required',
        'imagen'=>'required'

      ]);


      /* Post::create([
        'titulo'=>$request->titulo,
        'descripcion'=> $request->description,
        'imagen'=>$request->imagen,
        'user_id'=>auth()->user()->id
        ]); */



        /*$post = new Post;
        $post->titulo=$request->titulo;
        $post->descripcion= $request->description;
        $post->imagen=$request->imagen;
        $post->user_id=auth()->user()->id;
        $post->save();*/

        $request->user()->posts()->create([
          'titulo'=>$request->titulo,
          'descripcion'=> $request->description, 
          'imagen'=>$request->imagen,
          'user_id'=>auth()->user()->id
        ]);





        return redirect()->route('posts.index', auth()->user()->username);
      







    }
}
