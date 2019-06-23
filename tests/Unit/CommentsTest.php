<?php

namespace Tests\Unit;

use App\Comment;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CommentsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test **/

    public function can_create_comment()
    {
        $comment = create(Comment::class);

        $this->assertDatabaseHas('comments',[
            'body' => $comment->body
        ]);

        $this->assertSame(Comment::first()->body,$comment->body);
    }
}
