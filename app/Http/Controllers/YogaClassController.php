<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use App\Models\YogaClass;
use Illuminate\Http\Request;

class YogaClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = YogaClass::with('instructor');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_kelas', 'like', '%' . $search . '%')
                  ->orWhere('level', 'like', '%' . $search . '%')
                  ->orWhere('durasi', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%')
                  ->orWhereHas('instructor', function ($instQuery) use ($search) {
                      $instQuery->where('nama', 'like', '%' . $search . '%');
                  });
            });
        }

        $classes = $query->latest()->paginate(5)->withQueryString();

        return view('yoga_classes.index', compact('classes', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $instructors = Instructor::orderBy('nama')->get();
        return view('yoga_classes.create', compact('instructors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'level' => 'required|in:Beginner,Intermediate,Advanced',
            'durasi' => 'required|integer|min:1',
            'instructor_id' => 'required|exists:instructors,id',
            'deskripsi' => 'nullable|string',
        ], [
            'nama_kelas.required' => 'Nama kelas wajib diisi.',
            'level.required' => 'Level kelas wajib dipilih.',
            'level.in' => 'Level kelas tidak valid.',
            'durasi.required' => 'Durasi kelas wajib diisi.',
            'durasi.integer' => 'Durasi harus berupa angka.',
            'durasi.min' => 'Durasi minimal 1 menit.',
            'instructor_id.required' => 'Instruktur wajib dipilih.',
            'instructor_id.exists' => 'Instruktur tidak ditemukan.',
        ]);

        YogaClass::create($request->all());

        return redirect()->route('yoga-classes.index')
            ->with('success', 'Kelas yoga berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(YogaClass $yogaClass)
    {
        $instructors = Instructor::orderBy('nama')->get();
        return view('yoga_classes.edit', compact('yogaClass', 'instructors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, YogaClass $yogaClass)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'level' => 'required|in:Beginner,Intermediate,Advanced',
            'durasi' => 'required|integer|min:1',
            'instructor_id' => 'required|exists:instructors,id',
            'deskripsi' => 'nullable|string',
        ], [
            'nama_kelas.required' => 'Nama kelas wajib diisi.',
            'level.required' => 'Level kelas wajib dipilih.',
            'level.in' => 'Level kelas tidak valid.',
            'durasi.required' => 'Durasi kelas wajib diisi.',
            'durasi.integer' => 'Durasi harus berupa angka.',
            'durasi.min' => 'Durasi minimal 1 menit.',
            'instructor_id.required' => 'Instruktur wajib dipilih.',
            'instructor_id.exists' => 'Instruktur tidak ditemukan.',
        ]);

        $yogaClass->update($request->all());

        return redirect()->route('yoga-classes.index')
            ->with('success', 'Kelas yoga berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(YogaClass $yogaClass)
    {
        $yogaClass->delete();

        return redirect()->route('yoga-classes.index')
            ->with('success', 'Kelas yoga berhasil dihapus.');
    }
}
