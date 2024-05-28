<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    public function index()
    {
        $pekerjaans = Pekerjaan::all();
        return response()->json($pekerjaans);
    }

    public function store(Request $request)
    {
        $pekerjaan = Pekerjaan::create($request->all());
        return response()->json($pekerjaan, 201);
    }

    public function show($id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);
        return response()->json($pekerjaan);
    }

    public function update(Request $request, $id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);
        $pekerjaan->update($request->all());
        return response()->json($pekerjaan);
    }

    public function destroy($id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);
        $pekerjaan->delete();
        return response()->json(null, 204);
    }
}

