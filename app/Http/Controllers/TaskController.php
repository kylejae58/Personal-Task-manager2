<?php

namespace App\Http\Controllers;

use App\Models\Task;            //task from models 
use Carbon\Carbon;               //dates and times.
use Illuminate\Http\Request;      //Scanner kong sa Java

class TaskController extends Controller
{
    public function create()
    {
        return view('tasks-create');
    }

    public function index() //for Geting all tasks from the database.
    {
        $tasks = Task::orderByRaw("CASE WHEN status = 'Completed' THEN 1 ELSE 0 END")
            ->orderBy('due_date')
            ->orderByDesc('created_at')
            ->get();

        return view('tasks', compact('tasks'));
    }

    public function calendar() //for calendar with tasks for the current month.
    {
        $month = now()->startOfMonth();
        $tasks = Task::whereBetween('due_date', [
            $month->toDateString(),
            $month->copy()->endOfMonth()->toDateString(),
        ])
            ->orderBy('due_date')
            ->get();
        $tasksByDate = $tasks->groupBy(function (Task $task) {
            return Carbon::parse($task->due_date)->format('Y-m-d');
        });

        return view('calendar', compact('month', 'tasksByDate'));
    }

    public function store(Request $request)  //for submit the Add Task form
    {
        $validated = $request->validate([
            'task_name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'status' => 'required|in:Pending,Completed',
            'due_date' => ['nullable', 'date'],
        ]);

        Task::create([
            'task_name' => $validated['task_name'],
            'description' => $validated['description'] ?? null,
            'status' => $validated['status'],
            'due_date' => $validated['due_date'] ?? null,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function update(Request $request, Task $task) //for edit an existing task
    {
        $validated = $request->validate([
            'task_name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'status' => 'required|in:Pending,Completed',
            'due_date' => ['nullable', 'date'],
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

  
    public function toggle(Task $task) //to change a task from Pending to Completed
    {
        $task->update([
            'status' => $task->status === 'Completed' ? 'Pending' : 'Completed',
        ]);

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task) //delete a task.
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
