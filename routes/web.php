<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\View;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('projects', ProjectController::class);


View::composer('*', function ($view) {
    $upcomingProjects = \App\Models\Project::where('due_date', '>=', \Carbon\Carbon::now())
        ->where('due_date', '<=', \Carbon\Carbon::now()->addDays(7))
        ->where('status', 'active')
        ->get();

    $upcomingTasks = \App\Models\Task::where('due_date', '>=', \Carbon\Carbon::now())
        ->where('due_date', '<=', \Carbon\Carbon::now()->addDays(7))
        ->where('status', 'not_started')
        ->get();

    $view->with(compact('upcomingProjects', 'upcomingTasks'));
});
