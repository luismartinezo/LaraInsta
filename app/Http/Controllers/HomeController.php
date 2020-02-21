<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image; //Utilizamos o importamos el objeto image

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Traemos todas las imagenes descendentemente
        $images = Image::orderBy('id', 'desc')->paginate(5);

        return view('home', [
            'images' => $images
        ]);
    }
}
