<?php

namespace App\Http\Controllers;

use App\Models\Catogry;
use App\Models\Job;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function __invoke(Request $request)
    {
        $cats=Catogry::inRandomOrder()->withCount('job')->limit(8)->get();
        $jobs=Job::inRandomOrder()->limit(4)->get();
        $jobLocations=Job::select('location')->distinct()->take(10)->get();

        return view('LandingPage.index')->with(
            [
                'cats'=>$cats,
                'jobs'=>$jobs,
                'jobLocations'=>$jobLocations
            ]
        );   
    }
}
