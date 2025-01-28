<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'due_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:active,completed,canceled',
            'tasks' => 'nullable|array',
            'tasks.*.name' => 'required|string|max:255'
        ]);
    
        $project = Project::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'start_date' => $validatedData['start_date'],
            'due_date' => $validatedData['due_date'],
            'status' => $validatedData['status']
        ]);
    
        if (!empty($validatedData['tasks'])) {
            foreach ($validatedData['tasks'] as $taskData) {
                $project->tasks()->create([
                    'name' => $taskData['name'],
                    'status' => 'not_started'
                ]);
            }
        }
    
        return redirect()->route('projects.index')->with('success', 'Proyek berhasil ditambahkan.');
    }
    

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'due_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:active,completed,canceled'
        ]);

        $project->update($validatedData);

        return redirect()->route('projects.show', $project);
    }

    public function destroy(Project $project)
    {
        $project->tasks()->delete();
        $project->delete();
    
        return redirect()->route('projects.index')->with('success', 'Proyek berhasil dihapus.');
    }
}
