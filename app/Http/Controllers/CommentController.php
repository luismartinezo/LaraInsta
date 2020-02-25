<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function save(Request $request)
    {
        // Validacion
        $validate = $this->validate($request, [
            'image_id' => 'integer|required',
            'content' => 'string|required'
        ]);

        // Recoger datos del formulario
        $image_id = $request->input('image_id');
        $content = $request->input('content');
        // var_dump($content);
        // exit;
    }
}
