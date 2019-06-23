<?php

namespace Tests\Feature;

use App\Issue;
use App\Record;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class IssuesTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = create(User::class);

        $this->record = create(Record::class);
    }


    /** @test **/

    public function authenticated_user_can_create_issue()
    {
        $this->be($this->user);

        $this->post(route('issues.store'),[
            'title' => 'issue title',
            'description' => 'issue description',
            'record_id' => $this->record->id,
            'deadline' => Carbon::today(),
            'user_id' => $this->user->id
        ])
            ->assertStatus(201);
    }

    /** @test **/

    public function unauthenticated_user_cannot_create_issue()
    {
        $this->post(route('issues.store'),[
            'title' => 'issue title',
            'description' => 'issue description',
            'record_id' => $this->record->id,
            'deadline' => Carbon::today(),
            'user_id' => $this->user->id
        ])
            ->assertRedirect(route('login'));
    }

    /** @test **/

    public function authenticated_user_can_update_issue()
    {
        $this->be($this->user);

        $issue = create(Issue::class);


        $this->put(route('issues.update',$issue),[
            'title' => 'new title',
            'description' => 'new description'
        ])

            ->assertStatus(200);

        $this->assertDatabaseHas('issues',['title' => 'new title']);
    }

    /** @test **/

    public function unauthenticated_user_cannot_update_issue()
    {
        $issue = create(Issue::class);

        $this->put(route('issues.update',$issue),[
            'title' => 'new title',
            'description' => 'new description'
        ])

            ->assertRedirect(route('login'))

            ->assertStatus(302);

        $this->assertDatabaseMissing('issues',['title' => 'new title']);
    }
}
