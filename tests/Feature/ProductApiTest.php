<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductApiTest extends TestCase
{
    public function test_unauthenticated_user_cannot_get_products()
    {
        $response = $this->getJson('/api/products');

        $response->assertStatus(401);
    }

    public function test_unauthenticated_user_cannot_create_product()
    {
        $response = $this->postJson('/api/products', [
            'name' => 'Test Product',
            'price' => 100,
            'stock' => 5
        ]);

        $response->assertStatus(401);
    }
}