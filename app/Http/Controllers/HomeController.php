<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Denuncia;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$denuncias = Denuncia::paginate(10);
        return view('home', compact('denuncias'));
    }
}
