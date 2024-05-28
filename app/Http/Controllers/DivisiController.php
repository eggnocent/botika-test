<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function index()
    {
        $divisis = Divisi::all();
        return response()->json($divisis);
    }

    public function store(Request $request)
    {
        $divisi = Divisi::create($request->all());
        return response()->json($divisi, 201);
    }

    public function show($id)
    {
        $divisi = Divisi::findOrFail($id);
        return response()->json($divisi);
    }

    public function update(Request $request, $id)
    {
        $divisi = Divisi::findOrFail($id);
        $divisi->update($request->all());
        return response()->json($divisi);
    }

    public function destroy($id)
    {
        $divisi = Divisi::findOrFail($id);
        $divisi->delete();
        return response()->json(null, 204);
    }
}

