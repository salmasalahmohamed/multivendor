<?php

namespace Tests\Feature;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Tests\TestCase;

class CartControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->product = Product::factory()->create();

    }

    /** @test */
    public function test_user_can_view_cart()
    {
        $this->actingAs($this->user)
            ->get(route('cart', $this->product))
            ->assertStatus(200)
            ->assertViewIs('user.cart');
    }

    /** @test */
    public function test_user_can_add_product_to_cart()
    {
        $this->actingAs($this->user, 'customer')
            ->post(route('cart.store', $this->product), [
                'product_id' => $this->product->id,
                'quantity' => 2,
            ])
            ->assertStatus(200)
            ->assertJson(['success' => true]);

    }

    /** @test */
    public function test_user_can_update_cart_quantity()
    {
        $cookie = (string) \Illuminate\Support\Str::uuid();

        $cart = Cart::create([
            'cookie_id' => $cookie,
            'product_id' => $this->product->id,
            'quantity' => 1,
        ]);


        $response = $this->withCookie('cart_id', $cookie)
            ->patch(route('cart.update', $this->product->id), [
                'quantity' => 5
            ]);

        $response->assertStatus(200);
        $this->assertEquals(5, Cart::first()->quantity);

    }

    /** @test */
    public function test_user_can_remove_product_from_cart()
    {
        $cookie = (string) \Illuminate\Support\Str::uuid();

        $cart = Cart::create([
            'cookie_id' => $cookie,
            'product_id' => $this->product->id,
            'quantity' => 1,
        ]);

        $response = $this->withCookie('cart_id', $cookie)
            ->post(route('cart.delete', $this->product->id)
            );

        $response->assertStatus(200);
        $this->assertEmpty( Cart::first());

    }


}
