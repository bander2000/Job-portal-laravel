<?php

namespace App\Http\Controllers;

use App\Models\Catogry;
use App\Models\Job;
use Illuminate\Http\Request;

class CatogryController extends Controller
{
    //
    public function index()
    {
        $cats=Catogry::withCount('job')->paginate(8);
        return view('AllCatogry.index')->with('cats',$cats);
    }

    public function show($id)
    {
        $catogryName=Catogry::findOrFail($id)->name;
        if (request()->WorkType)
        {
            $jobs = Job::where('catogry_id',$id)->where('type', '=', request()->WorkType)->paginate(6);
        }
        else if (request()->location)
        {
            $jobs = Job::where('catogry_id',$id)->where('location', '=', request()->location)->paginate(6);
        }
        else if (request()->SalaryType)
        {
            $jobs = Job::where('catogry_id',$id)->where('salaryT', '=', request()->SalaryType)->paginate(6);
        }
        else if(request()->Date)
        {
     
            $jobs = Job::where('catogry_id',$id)->where("created_at", '=<', now()->subDays(request()->Date))->paginate(6);
        }
        else
        {
            $jobs = Job::where('catogry_id',$id)->orderBy('created_at','desc')->paginate(6);
        }

       
        $cats=Catogry::all();
        $jobsCount=$jobs->total();
        $jobLocations=Job::select('location')->distinct()->take(10)->get();
        return view('CatogryJobs.index')
        ->with([
        'jobs'=>$jobs
        ,'cats'=>$cats
        ,'catName'=>$catogryName
        ,'jobLocations'=>$jobLocations
        ,'jobsCount'=>$jobsCount
    ]);
    
    }
}
