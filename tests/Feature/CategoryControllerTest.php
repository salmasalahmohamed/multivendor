<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_a_category()
    {

        Storage::fake('public');

        $file = UploadedFile::fake()->image('category.jpg');
        $this->actingAs(User::factory()->create());

        $response = $this->post(route('categories.store'), [
            'name' => 'Electronics',
            'status' => 'active',
            'logo' => $file,
        ]);

        $response->assertRedirect(route('categories.index'));

        Storage::disk('public')->assertExists('upload/' . $file->hashName());

        $this->assertDatabaseHas('categories', [
            'name' => 'Electronics',
            'status' => 'active',
        ]);
    }
    public function test_it_can_update_a_category()
    {
        Storage::fake('public');
        $category = Category::factory()->create(['name' => 'Old Name']);

        $newFile = UploadedFile::fake()->image('new.jpg');
        $this->actingAs(User::factory()->create());

        $response = $this->put(route('categories.update', $category->id), [
            'name' => 'Updated Name',
            'status' => 'active',
            'logo' => $newFile,
        ]);

        $response->assertRedirect(route('categories.index'));
        $this->assertDatabaseHas('categories', ['name' => 'Updated Name']);
    }
    public function test_it_can_soft_delete_and_restore_a_category()
    {
        $category = Category::factory()->create();

        $this->actingAs(User::factory()->create());
        $this->delete(route('categories.destroy', $category->id));
        $this->assertSoftDeleted('categories', ['id' => $category->id]);

        $this->post(route('category.restore', $category->id));
        $this->assertDatabaseHas('categories', ['id' => $category->id]);
    }

}
