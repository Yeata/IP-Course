<?php

namespace Tests\Unit;

use App\Models\Category;
use Tests\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    /**
     * Description: Check if we can access the get all products API
     * Test Steps:
     *  1. Hit the get all products API endpoint: GET /api/products
     *  2. Check if the response status is 200
     */
    public function test_get_all_products()
    {
        $response = $this->get('/api/products');
        $response->assertStatus(200);
    }

    /**
     * Description: Check if we can create a product
     * Test Steps:
     *  1. Hit the create product API endpoint: POST /api/products
     *  2. Provide valid product data (name, pricing, category_id)
     *  3. Check if the response status is 201
     */
    public function test_create_a_product()
    {
        $response = $this->post('/api/products', [
            'name' => 'Test Product',
            'pricing' => 100,
            'category_id' => 1
        ]);
        $response->assertStatus(201);
    }

    /**
     * Description: Check if we can retrieve a product by ID
     * Test Steps:
     *  1. Create a product using a factory
     *  2. Hit the get product by ID API endpoint: GET /api/products/{id}
     *  3. Check if the response status is 200
     *  4. Verify the response contains the correct product data
     */
    public function it_returns_a_product_by_id()
    {
        $product = Product::factory()->create();

        $response = $this->get("/api/products/{$product->id}");

        $response->assertStatus(200)
            ->assertJson([
                'id' => $product->id,
                'name' => $product->name,
            ]);
    }

    /**
     * Description: Check if the API returns 404 when a product is not found
     * Test Steps:
     *  1. Hit the get product by ID API endpoint: GET /api/products/999
     *  2. Check if the response status is 404
     *  3. Verify the response contains "message" => "Product not found"
     */
    public function it_returns_404_if_product_not_found()
    {
        $response = $this->get('/api/products/999');

        $response->assertStatus(404)
            ->assertJson([
                'message' => 'Product not found'
            ]);
    }

    /**
     * Description: Check if we can update a product
     * Test Steps:
     *  1. Create a product and a category using factories
     *  2. Hit the update product API endpoint: PATCH /api/products/{id}
     *  3. Provide updated product data (name, pricing, category_id)
     *  4. Check if the response status is 200
     *  5. Verify the response contains the updated product data
     */
    public function test_update_a_product()
    {
        $product = Product::factory()->create();
        $category = Category::factory()->create();
        $response = $this->patch("/api/products/{$product->id}", [
            'name' => 'Updated Product',
            'pricing' => 150,
            'category_id' => $category->id
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Product updated successfully',
                'product' => [
                    'name' => 'Updated Product',
                    'pricing' => 150,
                    'category_id' => $category->id,
                    'id' => $product->id,
                ]
            ]);
    }

    /**
     * Description: Check if we can delete a product
     * Test Steps:
     *  1. Create a product using a factory
     *  2. Hit the delete product API endpoint: DELETE /api/products/{id}
     *  3. Check if the response status is 200
     *  4. Verify the response contains "message" => "Product deleted successfully"
     */
    public function test_delete_a_product()
    {
        $product = Product::factory()->create();

        $response = $this->delete("/api/products/{$product->id}");

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Product deleted successfully',
            ]);
    }

    /**
     * Description: Check if the API returns 404 when trying to delete a non-existent product
     * Test Steps:
     *  1. Hit the delete product API endpoint: DELETE /api/products/999
     *  2. Check if the response status is 404
     *  3. Verify the response contains "message" => "Product not found"
     */
    public function test_delete_a_product_not_found()
    {
        $response = $this->delete('/api/products/999');

        $response->assertStatus(404)
            ->assertJson([
                'message' => 'Product not found'
            ]);
    }
}
