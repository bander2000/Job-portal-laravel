<?php

namespace Tests\Feature;

use App\Models\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LandingPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *  @test
     * @return void
     */

    use RefreshDatabase;

    public function landing_page_load_correctly()
    {
        //Act
        $response = $this->get('/');

        //Assertion
        $response->assertStatus(200);
        $response->assertSee('Browse Top Categories');
    }

    
    public function job_is_visable()
    {
        //Arrange
        $job=Job::factory()->create([
            'title'=>'Front End Devloper',
            'type'=>'Partial-Time'
        ]);

        //Act
        $response = $this->get('/');

        //Assert
        $response->assertStatus(200);
        $response->assertSee($job->title);
    }

}
