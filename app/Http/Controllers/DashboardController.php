<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik jumlah proyek berdasarkan status
        $totalProjects = Project::count();
        $activeProjects = Project::where('status', 'active')->count();
        $completedProjects = Project::where('status', 'completed')->count();
        $canceledProjects = Project::where('status', 'canceled')->count();
    
        // Data untuk Pie Chart
        $chartData = [
            'labels' => ['Aktif', 'Selesai', 'Dibatalkan'],
            'data' => [$activeProjects, $completedProjects, $canceledProjects],
            'colors' => ['#28a745', '#007bff', '#dc3545'],
        ];
    
        // Data untuk Bar Chart
        $barChartData = [
            'labels' => ['Aktif', 'Selesai', 'Dibatalkan'],
            'data' => [$activeProjects, $completedProjects, $canceledProjects],
            'colors' => ['#ffc107', '#17a2b8', '#6c757d'],
        ];
    
        // Data untuk Line Chart: Proyek baru setiap bulan dalam 6 bulan terakhir
        $months = collect(range(5, 0))->map(function ($month) {
            return Carbon::now()->subMonths($month)->format('F');
        });
    
        $projectsByMonth = collect(range(5, 0))->map(function ($month) {
            return Project::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->subMonths($month)->month)
                ->count();
        });
    
        // **Tambahkan Monitoring Task (Doughnut Chart)**
        $notStartedTasks = Task::where('status', 'not_started')->count();
        $inProgressTasks = Task::where('status', 'in_progress')->count();
        $completedTasks = Task::where('status', 'completed')->count();
    
        $taskChartData = [
            'labels' => ['Belum Dimulai', 'Dalam Proses', 'Selesai'],
            'data' => [$notStartedTasks, $inProgressTasks, $completedTasks],
            'colors' => ['#6c757d', '#ffc107', '#28a745'],
        ];
    
        return view('dashboard', compact(
            'totalProjects', 
            'chartData', 
            'barChartData', 
            'months', 
            'projectsByMonth', 
            'taskChartData'
        ));
    }
}
