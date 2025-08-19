<?php

namespace App\View\Components;

use Closure;
use App\Models\Task;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class TaskList extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $tasks = Task::query()
            ->orderByRaw('completed_at is null desc')
            ->orderBy('id')
            ->get();

        return view('components.task-list', [
            'tasks' => $tasks,
        ]);
    }
}
