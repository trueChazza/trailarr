<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;

test('it renders without results', function () {
    Http::fake([
        '*' => Http::response(['results' => []])
    ]);

    $this->get('/')->assertStatus(200);
});
