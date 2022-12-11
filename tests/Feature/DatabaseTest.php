<?php

namespace Tests\Feature;

use App\Models\Post;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    // This will tell phpunit to recreate the database whenever, we try to run the tests again.
    use RefreshDatabase; 
    
    public function test_the_post_model()
    {
        Post::create([
            'title' => 'Hello',
            'description' => 'Hello there'
        ]);

        $this->assertDatabaseCount('posts', 1);
    }
}