<?php

namespace Tests\Feature;

use App\Board;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class BoardsTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = create(User::class);
    }

    /** @test **/

    public function authenticated_user_can_create_board()
    {
        $this->be($this->user);

        $this->post(route('boards.store'),[
            'name' => 'board name',
            'user_id' => $this->user->id
        ])
            ->assertStatus(302)

            ->assertRedirect(route('boards.show',Board::first()));
    }

    /** @test **/

    public function unauthenticated_user_cannot_create_board()
    {
        $this->post(route('boards.store'),[
            'name' => 'board name',
            'user_id' => $this->user->id
        ])
            ->assertStatus(302)

            ->assertRedirect(route('login'));
    }
}
