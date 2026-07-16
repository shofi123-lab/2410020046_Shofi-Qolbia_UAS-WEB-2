<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use App\Models\Schedule;
use App\Models\YogaClass;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the application dashboard.
     */
    public function index()
    {
        $totals = [
            'classes' => YogaClass::count(),
            'instructors' => Instructor::count(),
            'schedules' => Schedule::count(),
            'active_schedules' => Schedule::where('status', 'Aktif')->count(),
        ];

        // Fetch recent yoga classes with instructor info
        $recentClasses = YogaClass::with('instructor')
            ->latest()
            ->take(5)
            ->get();

        // Fetch upcoming active schedules
        $upcomingSchedules = Schedule::with('yogaClass.instructor')
            ->where('status', 'Aktif')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('totals', 'recentClasses', 'upcomingSchedules'));
    }
}
