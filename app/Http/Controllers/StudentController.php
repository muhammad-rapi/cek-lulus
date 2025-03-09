<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function checkGraduation(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'nisn' => 'required|numeric',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'nisn.required' => 'NISN wajib diisi.',
            'nisn.numeric' => 'NISN harus berupa angka.',
        ]);

        $student = Student::where('name', $request->name)->where('nisn', $request->nisn)->first();

        if (!$student) {
            return redirect()->route('home')->with('error', 'Nama atau NISN tidak ditemukan.');
        }

        return view('result', compact('student'));
    }
}
