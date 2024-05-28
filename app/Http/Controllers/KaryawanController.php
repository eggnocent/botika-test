<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::with('pekerjaan', 'divisi')->get();
        return response()->json($karyawans);
    }

    public function store(Request $request)
    {
        $karyawan = Karyawan::create($request->all());
        return response()->json($karyawan, 201);
    }

    public function show($id)
    {
        $karyawan = Karyawan::with('pekerjaan', 'divisi')->findOrFail($id);
        return response()->json($karyawan);
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($request->all());
        return response()->json($karyawan);
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();
        return response()->json(null, 204);
    }

    public function stats()
    {
        $totalKaryawan = Karyawan::count();
        $aktifKaryawan = Karyawan::where('status', 'aktif')->count();
        $nonaktifKaryawan = Karyawan::where('status', 'nonaktif')->count();
        $divisiStats = Karyawan::select('divisi_id', \DB::raw('count(*) as total'))
            ->groupBy('divisi_id')
            ->with('divisi')
            ->get();

        return response()->json([
            'total' => $totalKaryawan,
            'aktif' => $aktifKaryawan,
            'nonaktif' => $nonaktifKaryawan,
            'divisis' => $divisiStats,
        ]);
    }
}


