<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that authenticated users can access dashboard.
     *
     * @return void
     */
    public function test_authenticated_users_can_access_dashboard()
    {
        $this->assertDatabaseCount('users', 0);

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');

        $this->assertDatabaseCount('users', 1);

        $response->assertSuccessful();
    }
}
