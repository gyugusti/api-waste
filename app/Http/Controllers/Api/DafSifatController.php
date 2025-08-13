<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DafSifat;
use Illuminate\Http\Request;

class DafSifatController extends Controller
{
    public function index()
    {
        return response()->json(DafSifat::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
        ]);

        $dafsifat = DafSifat::create($data);

        return response()->json($dafsifat, 201);
    }

    public function show(DafSifat $dafsifat)
    {
        return response()->json($dafsifat);
    }

    public function update(Request $request, DafSifat $dafsifat)
    {
        $data = $request->validate([
            'nama' => 'sometimes|required|string',
        ]);

        $dafsifat->update($data);

        return response()->json($dafsifat);
    }

    public function destroy(DafSifat $dafsifat)
    {
        $dafsifat->delete();

        return response()->json(null, 204);
    }
}

