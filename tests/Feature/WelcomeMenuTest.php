<?php

it('shows product and api links on the welcome page', function () {
    $response = $this->get('/');

    $response
        ->assertOk()
        ->assertSee('/products')
        ->assertSee('/products/create')
        ->assertSee('/products/1')
        ->assertSee('/products/1/edit')
        ->assertSee('/products/1/cart')
        ->assertSee('/cart/clear')
        ->assertSee('/api/user')
        ->assertSee('/api/products')
        ->assertSee('/api/products/1')
        ->assertSee('/api/categories');
});
