<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Store;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_a_store_and_links_it_to_the_user()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post(route('store.insert'), [
            'name' => 'My Test Store',
            'description' => 'A cool shop.',
            'slug' => 'ffff',
            'status' => 'active',
            'logo' => 'test.jpg',
        ]);
        $store = \App\Models\Store::where('name', 'My Test Store')->first();

        $response->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'store_id' => $store->id,
        ]);
    }
}

