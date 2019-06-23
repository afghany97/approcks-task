<?php

namespace Tests\Unit;

use App\Board;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class BoardsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test **/

    public function can_create_board()
    {
        $board = create(Board::class);

        $this->assertDatabaseHas('boards',['name' => $board->name]);

        $this->assertSame(Board::first()->name,$board->name);
    }
}
