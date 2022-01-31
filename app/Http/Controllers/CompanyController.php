<?php

namespace App\Http\Controllers;

use App\Models\Applay;
use App\Models\Catogry;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function profile()
    {
        $authUser=Auth::user();
        return view('CompanyDashboard.profile')->with('authUser',$authUser);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'address'=> ['required', 'string', 'min:4', 'max:30'],
            'phone'=> ['required', 'numeric', 'digits:10'],
            'address'=> ['required', 'string', 'min:4', 'max:30'],
            'website'=> ['required', 'string', 'min:4']
        ]);

        $company=Company::where('user_id',Auth::user()->id)->first();
        $user=User::where('id',Auth::user()->id)->first();

       $company->update([
            'address'=>$request->address,
            'phone'=>$request->phone,
            'website'=>$request->website,
            'description'=>$request->description
       ]);

       $user->update([
        'name'=>$request->name,
        'email'=>$request->email
       ]);

       return redirect()->back()->with('success-message','Your Information update successufly');
    }

    public function logo(Request $request)
    {

        $company=Company::where('user_id',Auth::user()->id)->first();


        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('CompanyLogo');

            if ($company->logo) {
                Storage::delete($company->logo);
                $company->logo = $path;
                $company->save();
            } else {
                $company->logo = $path;
                $company->save();
            }
        }

        return redirect()->back()->with('success-message','Your Information update successufly');


    }

    public function coverPhoto(Request $request)
    {
        $company=Company::where('user_id',Auth::user()->id)->first();


        if ($request->hasFile('coverPhoto')) {
            $path = $request->file('coverPhoto')->store('CompanyCover');

            if ($company->coverPhoto) {
                Storage::delete($company->coverPhoto);
                $company->coverPhoto = $path;
                $company->save();
            } else {
                $company->coverPhoto = $path;
                $company->save();
            }
        }

        return redirect()->back()->with('success-message','Your Information update successufly');
    }

    public function CompanyJobs()
    {
        $company=Company::where('user_id',Auth::user()->id)->first();
        return view('CompanyDashboard.CompanyJobs')
        ->with('jobs',$company->job);
    }

    public function applayEmployee()
    {
        $applays=Applay::with('user')->whereHas('job',function($job) {
           $job->whereNull('user_id')->
           whereHas('company',function ($company) {
           $company->where('user_id',Auth::user()->id);
            });
        })->get();

        return view('CompanyDashboard.CompanyJobsApplay')
        ->with('applays',$applays);
    }

    public function editJob($id)
    {
        $job=Job::findOrFail($id);
        $cats=Catogry::all();
        return view('CompanyDashboard.EditJob')
        ->with(
            [
            'job'=>$job,
            'cats'=>$cats
            ]
        );
    }


    public function updateJob($id,Request $request)
    {
        $job=Job::findOrFail($id);

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

        $job->update(
            $request->all()
        );

        return redirect()->back()->with('success-message','Job Information update successufly');
        
    }


    public function deleteJob($id)
    {
        $job=Job::findOrFail($id);
        $job->delete();

        return redirect()->back()->with('success-message','Job Information update successufly');
    }


    public function createJob()
    {
        return view('CompanyDashboard.CreateJob')
        ->with('cats',Catogry::all());   
    }

    public function StoreJob(Request $request)
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

        Job::create([
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

        return redirect()->route('company.CompanyJobs')
        ->with('success-message','Job Add successufly');
    }


    public function AcceptEmployeeApplay(Request $request)
    {
        $jobId=$request->jobId;
        $empId=$request->empId;
       
        $job=Job::find($jobId);
       
        $job->employee_id=$empId;
        $job->save();

        return redirect()->back()->with('success','congadulation the job is taken');
    }

   


    
}
