<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $query = Instructor::query();

        if (!empty($search)) {
            $query->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('nomor_hp', 'like', '%' . $search . '%')
                  ->orWhere('pengalaman', 'like', '%' . $search . '%')
                  ->orWhere('jenis_kelamin', 'like', '%' . $search . '%');
        }

        $instructors = $query->latest()->paginate(5)->withQueryString();

        return view('instructors.index', compact('instructors', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instructors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'pengalaman' => 'required|integer|min:0|max:100',
            'nomor_hp' => 'required|string|max:20',
        ], [
            'nama.required' => 'Nama instruktur wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'jenis_kelamin.in' => 'Pilihan jenis kelamin tidak valid.',
            'pengalaman.required' => 'Pengalaman kerja wajib diisi.',
            'pengalaman.integer' => 'Pengalaman harus berupa angka.',
            'pengalaman.min' => 'Pengalaman minimal 0 tahun.',
            'nomor_hp.required' => 'Nomor HP wajib diisi.',
        ]);

        Instructor::create($request->all());

        return redirect()->route('instructors.index')
            ->with('success', 'Data instruktur berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instructor $instructor)
    {
        return view('instructors.edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instructor $instructor)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'pengalaman' => 'required|integer|min:0|max:100',
            'nomor_hp' => 'required|string|max:20',
        ], [
            'nama.required' => 'Nama instruktur wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'jenis_kelamin.in' => 'Pilihan jenis kelamin tidak valid.',
            'pengalaman.required' => 'Pengalaman kerja wajib diisi.',
            'pengalaman.integer' => 'Pengalaman harus berupa angka.',
            'pengalaman.min' => 'Pengalaman minimal 0 tahun.',
            'nomor_hp.required' => 'Nomor HP wajib diisi.',
        ]);

        $instructor->update($request->all());

        return redirect()->route('instructors.index')
            ->with('success', 'Data instruktur berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructor $instructor)
    {
        $instructor->delete();

        return redirect()->route('instructors.index')
            ->with('success', 'Data instruktur berhasil dihapus.');
    }
}
