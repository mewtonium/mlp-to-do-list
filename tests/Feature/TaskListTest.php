<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class TaskListTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function that_tasks_are_listed()
    {
        $tasks = Task::factory(3)->create();

        $this->get(route('tasks.index'))
            ->assertOk()
            ->assertSeeText([
                $tasks[0]->title,
                $tasks[1]->title,
                $tasks[2]->title,
            ]);
    }

    #[Test]
    public function that_no_tasks_are_listed_if_none_exist()
    {
        $this->get(route('tasks.index'))
            ->assertOk()
            ->assertSeeText('You have no tasks in your todo list.');
    }

    #[Test]
    public function a_task_can_be_created()
    {
        $this->post(route('tasks.store'), [
            'title' => 'Do something today',
        ])
        ->assertRedirect()
        ->assertSessionHas('alert.message', 'Task has been added!');

        $this->assertDatabaseCount(Task::class, 1);

        $this->get(route('tasks.index'))
            ->assertOk()
            ->assertSeeText([
                Task::first()->title,
            ]);
    }

    #[Test]
    public function a_task_can_be_deleted()
    {
        $tasks = Task::factory(3)->create();
        
        $this->delete(route('tasks.destroy', $tasks->first()))
            ->assertRedirect()
            ->assertSessionHas('alert.message', 'Task has been deleted');

        $this->assertDatabaseCount(Task::class, 2);

        $this->get(route('tasks.index'))
            ->assertOk()
            ->assertDontSeeText([
                $tasks->first()->title,
            ]);
    }

    #[Test]
    public function a_task_can_be_marked_as_complete()
    {
        $tasks = Task::factory(3)->create();
        
        $this->delete(route('tasks.destroy', $tasks->first()))
            ->assertRedirect()
            ->assertSessionHas('alert.message', 'Task has been deleted');

        $this->assertDatabaseCount(Task::class, 2);

        $this->get(route('tasks.index'))
            ->assertOk()
            ->assertDontSeeText([
                $tasks->first()->title,
            ]);
    }

    #[Test]
    public function the_task_list_is_paginated()
    {
        $tasks = Task::factory(15)->create();
        
        $this->get('/?page=1')
            ->assertOk()
            ->assertSeeText([
                $tasks[0]->title,
                $tasks[9]->title,
            ])
            ->assertDontSeeText($tasks[10]->title);

        $this->get('/?page=2')
            ->assertOk()
            ->assertSeeText([
                $tasks[10]->title,
                $tasks[14]->title,
            ])
            ->assertDontSeeText($tasks[9]->title);
    }
}
