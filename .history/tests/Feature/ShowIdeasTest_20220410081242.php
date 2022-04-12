<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Idea;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowIdeasTest extends TestCase
{
use RefreshDatabase;

public function list_of_ideas_shows_on_main_page()
{
    $ideaOne = Idea::factory()->create([
        'title' => 'My First Idea',
        'description' => 'Description of first Idea'
    ]);

    $ideaTwo = Idea::factory()->create([
        'title' => 'My Second Idea',
        'description' => 'Description of Second Idea'
    ]);

    $response = $this->get(route('ideas.index'));

    $response->assertSuccessful();

    $response->assertSee($ideaOne->title);
    $response->assertSee($ideaOne->description);

}

}
