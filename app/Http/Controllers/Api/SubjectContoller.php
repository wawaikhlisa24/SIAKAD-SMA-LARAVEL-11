<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject; // Menambahkan model Subject

class SubjectController extends Controller
{
    /**
     * Menampilkan daftar resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        return response()->json($subjects);
    }

    /**
     * Menyimpan resource baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject_name' => 'required|string',
            'class'        => 'required|string',
        ]);

        $newSubject = new Subject;
        $newSubject->subject_name = $request->subject_name;
        $newSubject->class = $request->class;
        $newSubject->save();

        return response()->json($newSubject, 201);
    }

    /**
     * Menampilkan resource yang spesifik.
     */
    public function show(string $id)
    {
        $subject = Subject::findOrFail($id);
        return response()->json($subject);
    }

    /**
     * Memperbarui resource yang spesifik.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'subject_name' => 'required|string',
            'class'        => 'required|string',
        ]);

        $subject = Subject::findOrFail($id);
        $subject->subject_name = $request->subject_name;
        $subject->class = $request->class;
        $subject->save();

        return response()->json($subject, 200);
    }

    /**
     * Menghapus resource yang spesifik.
     */
    public function destroy(string $id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return response()->json(null, 204);
    }
}
