<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Product;
use App\Models\Store;
use App\Models\Cart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CheckoutControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_checkout_page_redirects_if_cart_is_empty()
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'customer');

        $response = $this->get(route('cart.checkout'));

        $response->assertRedirect(route('home'));
    }

    /** @test */
    public function test_checkout_page_shows_if_cart_has_items()
    {
        $cookie = (string) \Illuminate\Support\Str::uuid();

        $user = User::factory()->create();
        $store = Store::factory()->create();
        $product = Product::factory()->create(['store_id' => $store->id]);
        $this->actingAs($user, 'customer');
        $cart = Cart::create([
            'cookie_id' => $cookie,
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

//        \App\Facads\cart::add($product->id, 1);


        $response = $this->get(route('cart.checkout'));

        $response->assertStatus(200);
        $response->assertViewIs('user.checkout');
        $response->assertViewHas('cart');
    }

    /** @test */
    public function test_store_creates_order_and_order_items()
    {
        $cookie = (string) \Illuminate\Support\Str::uuid();

        $user = User::factory()->create();
        $store = Store::factory()->create();
        $product = Product::factory()->create(['store_id' => $store->id]);
        $this->actingAs($user, 'customer');

//        \App\Facads\cart::add($product->id, 2);
        $cart = Cart::create([
            'cookie_id' => $cookie,
            'product_id' => $product->id,
            'quantity' => 1,
        ]);
        $data = [
            'addr' => [
                'shipping' => [
                    'first_name' => 'John',
                    'last_name' => 'Doe',
                    'email' => 'john@example.com',
                    'phone_number' => '0123456789',
                    'street_address' => '123 Street',
                    'postal_code' => '12345',
                    'city' => 'Cairo',
                    'country' => 'Eg',
                    'state' => 'Cairo',
                ],
                'pilling' => [
                    'first_name' => 'John',
                    'last_name' => 'Doe',
                    'email' => 'john@example.com',
                    'phone_number' => '0123456789',
                    'street_address' => '123 Street',
                    'postal_code' => '12345',
                    'city' => 'Cairo',
                    'country' => 'Eg',
                    'state' => 'Cairo',
                ],
            ],
        ];

        $response = $this->post(route('checkout.store'), $data);
        $response->assertRedirect();

        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'store_id' => $store->id,
            'payment_method' => 'code',
        ]);

        $this->assertDatabaseHas('order_items', [
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        $this->assertDatabaseHas('order_addresses', [
            'type' => 'shipping',
            'city' => 'Cairo',
        ]);
    }
}
