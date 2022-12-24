<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;

class TaskTest extends TestCase
{

    public function test_create_task_page_resturn_successful_response()
    {
        $response = $this->get('/tasks');

        $response->assertStatus(200);
    }

    public function test_listing_statistics_resturn_successful_response()
    {
        $response = $this->get('/tasks/statistics');

        $response->assertStatus(200);
    }
    
    public function test_store_task_resturn_successful_response()
    {
        $user_id = User::role('user')->first()->id;
        $admin_id = User::role('admin')->first()->id;
        $response = $this->post('/tasks/store', [
            'title'             => Str::random(5),
            'description'       => Str::random(20),
            'assigned_by_id'    => $admin_id,
            'assigned_to_id'    => $user_id,
        ]);

        $response->assertRedirect('/tasks');
    }
}
