<?php

namespace App\Actions;

use App\Models\Task;
use Lorisleiva\Actions\Concerns\AsAction;

class CompleteTask
{
    use AsAction;

    public function handle(Task $task): void
    {
        $task->completed_at = now();
        $task->save();
    }
}
