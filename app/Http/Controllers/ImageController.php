<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Image;

// use App\Image; //Utilizamos o importamos el objeto image 

class ImageController extends Controller
{
    // Esto restringe el acceso y lo devuelve a login
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('image.create');
    }

    public function save(Request $request)
    {
        // Validacion
        $validate = $this->validate($request, [
            'description' => 'required',
            'image_path' => 'required|image'
        ]);

        // Recoger datos
        $image_path = $request->file('image_path');
        $description = $request->input('description');
        // var_dump($image_path,$description );
        // exit();

        // Asignar valores al nuevo objeto
        $user = \Auth::user();
        $image = new Image();
        $image->user_id = $user->id;
        // $image->image_path = null;
        $image->description = $description;
       
        // Subir imagen 
        if ($image_path) {
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $image->image_path = $image_path_name;

        }

        $image->save();
        return redirect()->route('home')->
                                with(['message'=>'La imagen ha sido subida Correctamente']);

    }

    public function getImage($image_path_name)
    {
       $file = Storage::disk('images')->get($image_path_name);
       return new Response($file, 200);
    }
    
}
