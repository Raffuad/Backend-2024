<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json($students, 200);
    }

   # membuat method store
public function store(Request $request) {
    # menangkap data request
    $input = [
        'nama' => $request->nama,
        'nim' => $request->nim,
        'email' => $request->email,
        'jurusan' => $request->jurusan
    ];

    # menggunakan model Student untuk insert data
    $student = Student::create($input);

    $data = [
        'message' => 'Student is created succesfully',
        'data' => $student,
    ];

    // mengembalikan data (json) dan kode 201
    return response()->json($data, 201);
}

public function update(Request $request, $id) {
    # cari id student yang ingin diupdate
    $student = Student::find($id);

    if ($student) {
        # menangkap data request
        $input = [
            'nama' => $request->nama ?? $student->nama,
            'nim' => $request->nim ?? $student->nim,
            'email' => $request->email ?? $student->email,
            'jurusan' => $request->jurusan ?? $student->jurusan
        ];

        # melakukan update data
        $student->update($input);

        $data = [
            'message' => 'Student is updated',
            'data' => $student
        ];

        # mengembalikan data (json) dan kode 200
        return response()->json($data, 200);
    } else {
        $data = [
            'message' => 'Student not found'
        ];

        return response()->json($data, 404);
    }
}

    public function destroy($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }
        $student->delete();
        return response()->json(['message' => 'Student deleted successfully'], 200);
    }

    public function show($id)
{
    # cari id student yang ingin didapatkan
    $student = Student::find($id);

    if ($student) {
        # data yang akan dikembalikan
        $data = [
            'message' => 'Get detail student',
            'data' => $student,
        ];

        # mengembalikan data (json) dan kode 200
        return response()->json($data, 200);
    } else {
        # data yang akan dikembalikan
        $data = [
            'message' => 'Student not found',
        ];
 
        # mengembalikan data (json) dan kode 404
        return response()->json($data, 404);
    }
}
}

