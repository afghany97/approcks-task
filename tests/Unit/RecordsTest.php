<?php

namespace Tests\Unit;

use App\Record;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RecordsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test **/

    public function can_create_record()
    {
        $record = create(Record::class);

        $this->assertDatabaseHas('records',['name' => $record->name]);

        $this->assertSame(Record::first()->name,$record->name);
    }

    /** @test **/

    public function can_update_record()
    {
        $record = create(Record::class);

        $newName = 'new name';

        $record->update(['name' => $newName]);

        $this->assertDatabaseHas('records',['name' => $newName]);

        $this->assertSame($record->name,$newName);
    }
}
