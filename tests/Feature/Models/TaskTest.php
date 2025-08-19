<?php

namespace Tests\Feature\Models;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function the_completed_query_scope_returns_the_correct_results(): void
    {
        Task::factory(2)->completed()->create();
        Task::factory()->create();

        $this->assertEquals(2, Task::completed()->count());
    }
}
