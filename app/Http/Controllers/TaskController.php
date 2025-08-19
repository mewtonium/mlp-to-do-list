<?php

namespace App\Http\Controllers;

use App\Actions\CompleteTask;
use App\Actions\CreateTask;
use App\Actions\DeleteTask;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tasks');
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
    public function destroy(Task $task, DeleteTask $action)
    {
        $action->handle($task);

        return back()->with([
            'alert.message' => 'Task has been deleted',
            'alert.status' => 'info',
        ]);
    }

    /**
     * Marks a task as completed.
     */
    public function complete(Task $task, CompleteTask $action)
    {
        $action->handle($task);

        return back()->with([
            'alert.message' => 'Task has been marked as completed!',
            'alert.status' => 'success',
        ]);
    }
}
