<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    
    public function test_can_get_task_list()
    {
        \App\Models\Task::factory()->count(3)->create();

        $user = \App\Models\User::factory()->create();
        $token = $user->createToken('test')->plainTextToken;

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->getJson('/api/tasks');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data'
            ]);
    }

    public function test_can_update_task()
    {
        $user = \App\Models\User::factory()->create();

        $task = \App\Models\Task::factory()->create([
            'title' => 'Old Title'
        ]);

        $response = $this->actingAs($user, 'sanctum')
            ->putJson('/api/tasks/' . $task->id, [
                'title' => 'Updated Title'
            ]);

        $response->assertStatus(200)
            ->assertJsonFragment([
                'title' => 'Updated Title'
            ]);
    }
    
    public function test_can_delete_task()
    {
        $user = \App\Models\User::factory()->create();
        $token = $user->createToken('test')->plainTextToken;

        $task = \App\Models\Task::factory()->create();

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->deleteJson('/api/tasks/' . $task->id);

        $response->assertStatus(200);

        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id
        ]);
    }
    public function test_task_validation_fails_when_title_missing()
    {
        $user = \App\Models\User::factory()->create();
        $token = $user->createToken('test')->plainTextToken;

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->postJson('/api/tasks', [
                // no title
            ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['title']);
    }
}
