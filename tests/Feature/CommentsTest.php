<?php

namespace Tests\Feature;

use App\Comment;
use App\Issue;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CommentsTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = create(User::class);

        $this->issue = create(Issue::class);
    }


    /** @test **/

    public function authenticated_user_can_create_comment()
    {
        $this->be($this->user);

        $this->post("/issues/{$this->issue->id}/comments",[
            'user_id' => $this->user->id,
            'issue_id' => $this->issue->id,
            'body' => 'comment body',
            'attachment' => $file =UploadedFile::fake()->image('image.jpg')
        ])

            ->assertStatus(201);

        $this->assertDatabaseHas('comments',[
            'body' => 'comment body'
        ]);

        $comment = Comment::first();

        Storage::disk('public')->assertExists("images/comments/{$comment->id}/" . $file->hashName());

    }

    /** @test **/

    public function unauthenticated_user_cannot_create_comment()
    {
        $this->post("/issues/{$this->issue->id}/comments",[
            'user_id' => $this->user->id,
            'issue_id' => $this->issue->id,
            'body' => 'comment body'
        ])

            ->assertRedirect(route('login'))

            ->assertStatus(302);

        $this->assertDatabaseMissing('comments',[
            'body' => 'comment body'
        ]);
    }
}
