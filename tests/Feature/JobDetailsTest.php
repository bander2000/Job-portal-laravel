<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JobDetailsTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function Job_details_load_correctly()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function can_view_job_details()
    {

       $job= Job::factory()->create([
            'title' => 'New Job',
        ]);

        $response = $this->get('/job/'.$job->id);

        $response->assertStatus(200);
        $response->assertSee('New Job');
       
    }

}
