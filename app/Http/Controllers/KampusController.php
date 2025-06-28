<?php

namespace App\Http\Controllers;

use App\Models\Kampus;
use Illuminate\Http\Request;


class KampusController extends Controller
{

    public function index()
    {
        return response()->json(Kampus::all());
    }

    public function show($id)
    {
        $kampus = Kampus::find($id);
        if (!$kampus) return response()->json(['message' => 'Data tidak ditemukan'], 404);
        return response()->json($kampus);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'namaKampus' => 'required',
            'alamat' => 'required',
            'noTelp' => 'required',
            'kategori' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'jurusan' => 'required'
        ]);

        $kampus = Kampus::create($request->all());
        return response()->json($kampus, 201);
    }

    public function update(Request $request, $id)
    {
        $kampus = Kampus::find($id);
        if (!$kampus) return response()->json(['message' => 'Data tidak ditemukan'], 404);

        $kampus->update($request->all());
        return response()->json($kampus);
    }

    public function destroy($id)
    {
        $kampus = Kampus::find($id);
        if (!$kampus) return response()->json(['message' => 'Data tidak ditemukan'], 404);

        $kampus->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
