<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = \Auth::user();
        $likes = Like::where('user_id', $user->id)->orderBy('id', 'desc')
                            ->paginate(5);

        return view('like.index', [
                'likes' => $likes
        ]);
    }

    public function like($image_id)
    {
        # Recoger datos de usuario y la imagenes
        $user = \Auth::user();

        // Condicion para saber si existe el like
        $isset_like = Like::where('user_id', $user->id)
                            ->where('image_id', $image_id)
                            ->count();

                            // var_dump($like);exit
        if ($isset_like == 0) {
           
        $like = new Like();
        $like->user_id = $user->id;
        $like->image_id = (int)$image_id;

        // Guardar
        $like->save();

        return response()->json([
            'like' => $like
        ]);
        }else {
            return response()->json([
                'message' => 'Ya le has dado like'
            ]);
        }
    }

    public function dislike($image_id)
    {
         # Recoger datos de usuario y la imagenes
         $user = \Auth::user();

         // Condicion para saber si existe el like
         $like = Like::where('user_id', $user->id)
                             ->where('image_id', $image_id)
                             ->first();
 
                             // var_dump($like);exit
         if ($like) {
          
         // Guardar
         $like->delete();
 
         return response()->json([
             'like' => $like,
             'message' => 'Ya no te gusta'
         ]);
         }else {
             return response()->json([
                 'message' => 'El like no existe'
             ]);
         }
    }

    
}
