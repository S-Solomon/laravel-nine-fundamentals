<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    // This will tell phpunit to recreate the database whenever, we try to run the tests again.
    use RefreshDatabase; 
    
    public function test_the_post_model()
    {
        Post::factory()->count(3)->create();

        $this->assertDatabaseCount('posts', 3);
    }

    public function test_the_posts_user_relationship()
    {
        $user = User::factory()
            ->hasPosts(5)
            ->create();

        $this->assertDatabaseCount('posts', 5);    
        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseHas('posts', [
            'user_id' => $user->id,
        ]);    
    }
}