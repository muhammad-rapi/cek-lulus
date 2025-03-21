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
            'nisn' => 'required|numeric',
        ], [
            'nisn.required' => 'NISN wajib diisi.',
            'nisn.numeric' => 'NISN harus berupa angka.',
        ]);

        $student = Student::where('nisn', $request->nisn)->first();

        if (!$student) {
            return redirect()->route('home')->with('error', 'Data NISN tidak ditemukan.');
        }

        return view('result', compact('student'));
    }
}
