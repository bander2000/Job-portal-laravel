<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JobCatogryResource;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //
    public function index()
    {
           $jobs=Job::with('catogry')->get();
           return response()->json($jobs,200);
    }


    public function show($id)
    {
        $job=Job::findOrFail($id);
        return $job->withCount('applay')->first();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:25'],
            'location' => ['required', 'string','max:30'],
            'type'=> ['required', 'string','in:Full-Time,Partial-Time,From-Home'],
            'phone'=> ['required', 'numeric', 'digits:10'],
            'catogry_id'=> ['required', 'string'],
            'lastDate'=> ['required', 'date','after_or_equal:start_date'],
            'description'=>['required', 'string','max:600'],
            'requiredKnowledge'=>['required', 'string','max:600'],
            'education'=>['required', 'string','max:600']
        ]);

        $job=Job::create([
            'title'=>$request->title,
            'location'=>$request->location,
            'type'=>$request->type,
            'phone'=>$request->phone,
            'catogry_id'=>$request->catogry_id,
            'lastDate'=>$request->lastDate,
            'description'=>$request->description,
            'requiredKnowledge'=>$request->requiredKnowledge,
            'education'=>$request->education,
            'company_id'=>Auth::user()->company->id
        ]);

      return $job;
      
    }

}
