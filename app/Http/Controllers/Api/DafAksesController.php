<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DafAkses;
use Illuminate\Http\Request;

class DafAksesController extends Controller
{
    public function index()
    {
        return response()->json(DafAkses::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'jenis_akses' => 'required|string',
        ]);

        $dafakses = DafAkses::create($data);

        return response()->json($dafakses, 201);
    }

    public function show(DafAkses $dafakses)
    {
        return response()->json($dafakses);
    }

    public function update(Request $request, DafAkses $dafakses)
    {
        $data = $request->validate([
            'nama' => 'sometimes|required|string',
            'jenis_akses' => 'sometimes|required|string',
        ]);

        $dafakses->update($data);

        return response()->json($dafakses);
    }

    public function destroy(DafAkses $dafakses)
    {
        $dafakses->delete();

        return response()->json(null, 204);
    }
}

