<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

    class AnimalController extends Controller
{
    private $animals = ['Kucing', 'Anjing', 'Burung'];

    public function index()
    {
        return response()->json($this->animals);
    }

    public function store(Request $request)
    {
        $animal = $request->input('name');
        array_push($this->animals, $animal);
        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'data' => $this->animals
        ], 201);
    }

    public function update(Request $request, $id)
    {
        if(isset($this->animals[$id])){
            $this->animals[$id] = $request->input('name');
            return response()->json([
                'message' => 'Data berhasil diubah',
                'data' => $this->animals
            ], 200);
        } else {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
    }

    public function destroy($id)
    {
        if(isset($this->animals[$id])){
            unset($this->animals[$id]);
            $this->animals = array_values($this->animals);
            return response()->json([
                'message' => 'Data berhasil dihapus',
                'data' => $this->animals
            ], 200);
        } else {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
    }
}