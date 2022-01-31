<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //
    public function show($id)
    {
        $job=Job::withCount('applay')->findOrFail($id);
        return view('ShowJobDetails.index')
        ->with('job',$job);
    }
}
