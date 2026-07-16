<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\YogaClass;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Schedule::with('yogaClass.instructor');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('hari', 'like', '%' . $search . '%')
                  ->orWhere('jam', 'like', '%' . $search . '%')
                  ->orWhere('status', 'like', '%' . $search . '%')
                  ->orWhereHas('yogaClass', function ($classQuery) use ($search) {
                      $classQuery->where('nama_kelas', 'like', '%' . $search . '%');
                  });
            });
        }

        $schedules = $query->latest()->paginate(5)->withQueryString();

        return view('schedules.index', compact('schedules', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = YogaClass::orderBy('nama_kelas')->get();
        return view('schedules.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'yoga_class_id' => 'required|exists:yoga_classes,id',
            'hari' => 'required|string|max:50',
            'jam' => 'required|string|max:10', // e.g. "08:00"
            'status' => 'required|in:Aktif,Nonaktif',
        ], [
            'yoga_class_id.required' => 'Kelas yoga wajib dipilih.',
            'yoga_class_id.exists' => 'Kelas yoga tidak ditemukan.',
            'hari.required' => 'Hari latihan wajib diisi.',
            'jam.required' => 'Jam latihan wajib diisi.',
            'status.required' => 'Status jadwal wajib dipilih.',
            'status.in' => 'Status jadwal tidak valid.',
        ]);

        Schedule::create($request->all());

        return redirect()->route('schedules.index')
            ->with('success', 'Jadwal yoga berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        $classes = YogaClass::orderBy('nama_kelas')->get();
        return view('schedules.edit', compact('schedule', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'yoga_class_id' => 'required|exists:yoga_classes,id',
            'hari' => 'required|string|max:50',
            'jam' => 'required|string|max:10',
            'status' => 'required|in:Aktif,Nonaktif',
        ], [
            'yoga_class_id.required' => 'Kelas yoga wajib dipilih.',
            'yoga_class_id.exists' => 'Kelas yoga tidak ditemukan.',
            'hari.required' => 'Hari latihan wajib diisi.',
            'jam.required' => 'Jam latihan wajib diisi.',
            'status.required' => 'Status jadwal wajib dipilih.',
            'status.in' => 'Status jadwal tidak valid.',
        ]);

        $schedule->update($request->all());

        return redirect()->route('schedules.index')
            ->with('success', 'Jadwal yoga berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('schedules.index')
            ->with('success', 'Jadwal yoga berhasil dihapus.');
    }
}
