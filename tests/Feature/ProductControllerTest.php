<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_updates_a_product_and_creates_new_tags()
    {
        $this->actingAs(User::factory()->create());

        $product = Product::factory()->create([
            'name' => 'Old Product',
            'price' => 100,
        ]);

        $oldTag = Tag::create(['name' => 'Electronics','slug'=>'Electronics']);

        $product->tags()->attach($oldTag->id);

        $newTags = json_encode([
            ['value' => 'NewTag1'],
            ['value' => 'NewTag2'],
        ]);

        $response = $this->post(route('product.update', $product->id), [
            'name' => 'Updated Product',
            'price' => 200,
            'tag' => $newTags,
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Updated Product',
            'price' => 200,
        ]);

        $this->assertDatabaseHas('tags', ['name' => 'NewTag1']);
        $this->assertDatabaseHas('tags', ['name' => 'NewTag2']);

        $product->refresh();
        $tagNames = $product->tags()->pluck('name')->toArray();
        $this->assertContains('NewTag1', $tagNames);
        $this->assertContains('NewTag2', $tagNames);
    }
}
