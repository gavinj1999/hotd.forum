<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowIdeasTest extends TestCase
{
use RefreshDatabase;

public function list_of_ideas_shows_on_main_page()
{
    $ideaOne = Idea::factory()->create([
        'title' => 'My First Title',
        'description' => 'Description of first Title'
    ]);

    $ideaTwo = Idea::factory()->create([
        'title' => 'My Second Title',
        'description' => 'Description of Second Title'
    ]);

    $response = $this->get(route('ideas.index'));

    $response->assertSuccessful();

}

}
