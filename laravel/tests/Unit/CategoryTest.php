<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_get_all_categories()
    {
        $response = $this->get('/api/categories');
        $response->assertStatus(200);
    }
    public function test_create_a_category(){
        $response = $this->post('/api/categories', [
            'name' => 'Test Category'
        ]);
        $response->assertStatus(201);
    }

    public function test_get_a_category_by_id(){
        $category = Category::factory()->create();

        $response = $this->get("/api/categories/{$category->id}");
        $response->assertStatus(200)->assertJson([
            'name' => $category->name,
        ]);
    }
    public function test_update_a_category(){
        $category = Category::factory()->create();

        $response = $this->patch("/api/categories/{$category->id}", [
            'name' => 'Updated Category'
        ]);
        $response->assertStatus(200)->assertJson([
            'name' => 'Updated Category',
        ]);
    }
    public function test_delete_a_category(){
        $category = Category::factory()->create();

        $response = $this->delete("/api/categories/{$category->id}");
        $response->assertStatus(200)->assertJson([
            'message' => 'Category deleted successfully',
        ]);
    }
    


}
