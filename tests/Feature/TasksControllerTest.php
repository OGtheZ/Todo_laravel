<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TasksControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_able_to_visit_tasks_page()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->get('/tasks');

        $response->assertStatus(200);
        $response->assertViewIs('showTasks');
        $response->assertViewHas(['tasks']);
    }

    public function test_able_to_visit_create_task_page()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->get('/tasks/create');

        $response->assertStatus(200);
        $response->assertViewIs('createTaskForm');
    }
}
