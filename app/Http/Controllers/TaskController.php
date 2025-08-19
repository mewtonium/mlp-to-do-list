<?php

namespace App\Http\Controllers;

use App\Actions\CreateTask;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::query()
            ->orderByDesc('created_at')
            ->get();

        return view('tasks', [
            'tasks' => $tasks,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request, CreateTask $action)
    {
        $action->handle($request->validated());

        return back()->with([
            'alert.message' => 'Task has been added!',
            'alert.status' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
