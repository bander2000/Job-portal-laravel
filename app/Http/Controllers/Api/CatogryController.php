<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatogryResource;
use App\Http\Resources\JobResource;
use App\Models\Catogry;
use App\Models\Job;
use Illuminate\Http\Request;

class CatogryController extends Controller
{
    //
    public function index()
    {
        return CatogryResource::collection(
            Catogry::paginate(8)
        );
    }

    public function show($id)
    {
        if (request()->WorkType)
        {
            $jobs = Job::where('catogry_id',$id)->where('type', '=', request()->WorkType);
        }
        else if (request()->location)
        {
            $jobs = Job::where('catogry_id',$id)->where('location', '=', request()->location);
        }
        else if (request()->SalaryType)
        {
            $jobs = Job::where('catogry_id',$id)->where('salaryT', '=', request()->SalaryType);
        }
        else if(request()->Date)
        {
            $jobs = Job::where('catogry_id',$id) ->where("created_at", '=<', now()->subDays( request()->Date));
        }
        else
        {
            $jobs = Job::where('catogry_id',$id)->orderBy('created_at','desc');
        }



        return $jobs->paginate(8);


    }
    
}
