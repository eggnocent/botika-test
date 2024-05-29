<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\Models\Pekerjaan;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::with('pekerjaan', 'divisi')->get();
        return inertia('Karyawan/Index', ['karyawans' => $karyawans]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'pekerjaan_id' => 'required|integer|exists:pekerjaans,id',
            'divisi_id' => 'required|integer|exists:divisis,id',
            'status' => 'required|string|in:aktif,nonaktif',
            // Add other fields and their validation rules
        ]);

        $karyawan = Karyawan::create($validatedData);
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

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'pekerjaan_id' => 'sometimes|required|integer|exists:pekerjaans,id',
            'divisi_id' => 'sometimes|required|integer|exists:divisis,id',
            'status' => 'sometimes|required|string|in:aktif,nonaktif',
            // Add other fields and their validation rules
        ]);

        $karyawan->update($validatedData);
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
        $divisiStats = Karyawan::select('divisi_id', DB::raw('count(*) as total'))
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
