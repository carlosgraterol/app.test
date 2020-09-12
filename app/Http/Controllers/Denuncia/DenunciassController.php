<?php

namespace App\Http\Controllers\Denuncia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Delito;

class DenunciaController extends Controller
{
    public function index()
    {
        $delitos = Delito::all();
        return view('denuncia.denuncia', compact('delistos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
