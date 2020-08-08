<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesor;

class ProfesorController extends Controller
{
    public function index()
    {
        return Profesor::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $profesor = new Profesor;
        $profesor->first_name = $request->first_name;
        $profesor->last_name = $request->last_name;
        $profesor->email = $request->email;

        $profesor->save();
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
        return Profesor::destroy($id);
    }
}
