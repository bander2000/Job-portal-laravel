<?php

namespace Tests\Feature;

use App\Models\Catogry;
use App\Models\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CatogryJobsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     * @test
     * @return void
     */


    
    public function catogry_jobs_load_correctly()
    {
        Catogry::factory()->create([
            'name' => 'bander',
            'icon'=>'tour'
        ]);
        
        //Act
        $response = $this->get('/catogry/1/jobs');

        //Arrange
        $response->assertStatus(200);
    }

     
    public function pagination_for_jobs_works()
    {

        // Page 1 Jobs
        for ($i=1; $i < 6 ; $i++) {
            Job::factory()->create([
                'title' => 'job '.$i,
                'catogry_id'=>1
            ]);
        }

        // Page 2 Jobs
        for ($i=7; $i < 13 ; $i++) {
            Job::factory()->create([
                'title' => 'job '.$i,
                'catogry_id'=>1
            ]);
        }


        $response = $this->get('/catogry/1/jobs');

        $response->assertSee('job 1');
        $response->assertSee('job 5');

        $response = $this->get('/catogry/1/jobs?page=2');

        $response->assertSee('job 8');
        $response->assertSee('job 12');

    }


}
