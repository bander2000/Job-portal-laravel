<?php

namespace App\Http\Controllers;

use App\Models\Catogry;
use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke()
    {
        if (request()->location && request()->jobName) 
        {
            $location=request()->location;
            $jobname=request()->jobName;
            $jobs=Job::where('location','=', $location)
            ->where('title','like',"%$jobname%")->paginate(9);
        } 
       else if(request()->jobName)
        {
            $jobname=request()->jobName;
            $jobs=Job::where('title','like',"%$jobname%")->paginate(9);
        }

        else if(request()->location)
        {
            $jobs=Job::where('location','like',request()->location)->paginate(9);
        }
       
       else if (request()->WorkType)
        {
            $job_type = request()->WorkType;
            $jobs = Job::where('type', '=', $job_type)->paginate(9);
        }
        
        else if(request()->Date)
        {
            $job_date = request()->Date;
            $jobs = Job::where("created_at", '=<', now()->subDays($job_date));
                    
        }
        else
        {
            $jobs = Job::paginate(9);
        }

        
        $cats=Catogry::all();
        $jobsCount=$jobs->total();
        $jobLocations=Job::select('location')->distinct()->take(10)->get();



        return view('SearchJobs.index')
        ->with(['jobs'=>$jobs,
        'cats'=>$cats,
        'jobsCount'=>$jobsCount,
        'jobLocations'=>$jobLocations]);
        

    }
}
