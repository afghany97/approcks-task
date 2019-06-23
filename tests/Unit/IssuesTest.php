<?php

namespace Tests\Unit;

use App\Issue;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class IssuesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test **/

    public function can_create_issue()
    {
        $issue = create(Issue::class);

        $this->assertDatabaseHas('issues',['title' => $issue->title]);

        $this->assertSame(Issue::first()->title,$issue->title);
    }

    /** @test **/

    public function can_update_issue()
    {
        $issue = create(Issue::class);

        $newTitle = 'new title';

        $issue->update(['title' => $newTitle]);

        $this->assertDatabaseHas('issues',['title' => $newTitle]);

        $this->assertSame($issue->title,$newTitle);
    }
}
