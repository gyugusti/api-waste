<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DafSatuan;
use Illuminate\Http\Request;

class DafSatuanController extends Controller
{
    public function index()
    {
        return response()->json(DafSatuan::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
        ]);

        $dafsatuan = DafSatuan::create($data);

        return response()->json($dafsatuan, 201);
    }

    public function show(DafSatuan $dafsatuan)
    {
        return response()->json($dafsatuan);
    }

    public function update(Request $request, DafSatuan $dafsatuan)
    {
        $data = $request->validate([
            'nama' => 'sometimes|required|string',
        ]);

        $dafsatuan->update($data);

        return response()->json($dafsatuan);
    }

    public function destroy(DafSatuan $dafsatuan)
    {
        $dafsatuan->delete();

        return response()->json(null, 204);
    }
}

