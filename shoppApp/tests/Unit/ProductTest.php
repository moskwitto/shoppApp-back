<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

test('fetchProducts', function () {
    $response = $this->get('/api/products');
    $response->assertStatus(200);
});