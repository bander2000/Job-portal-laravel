<?php

namespace App\Http\Controllers;

use App\Models\Applay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplayController extends Controller
{
    //
    public function store(Request $request)
    {
        $userId=Auth::user()->id;
        $jobId=$request->jobId;
        Applay::create([
            'user_id'=>$userId,
            'job_id'=>$jobId
        ]);

        return redirect(url()->previous() .'#JobOverView')
        ->with('success_message','job Applayed successfuly');
    }
}
