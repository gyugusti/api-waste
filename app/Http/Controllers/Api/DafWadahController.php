<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DafWadah;
use Illuminate\Http\Request;

class DafWadahController extends Controller
{
    public function index()
    {
        return response()->json(DafWadah::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
        ]);

        $dafwadah = DafWadah::create($data);

        return response()->json($dafwadah, 201);
    }

    public function show(DafWadah $dafwadah)
    {
        return response()->json($dafwadah);
    }

    public function update(Request $request, DafWadah $dafwadah)
    {
        $data = $request->validate([
            'nama' => 'sometimes|required|string',
        ]);

        $dafwadah->update($data);

        return response()->json($dafwadah);
    }

    public function destroy(DafWadah $dafwadah)
    {
        $dafwadah->delete();

        return response()->json(null, 204);
    }
}
