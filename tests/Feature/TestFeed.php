<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestFeed extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->post('/api/feed',['id'=>1,'content'=>1,'img_cover'=>2]);
        $response = $this->put('/api/feed/1',['content'=>1,'img_cover'=>2]);
        $response = $this->delete('/api/feed/1');
        $response->assertStatus(204);
    }
}
