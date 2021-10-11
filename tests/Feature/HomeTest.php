<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class HomeTest extends TestCase
{
    public function test_home()
    {
        Http::fake([
            '*' => Http::response(['results' => []])
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
