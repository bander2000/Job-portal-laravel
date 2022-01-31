<?php

namespace App\Http\Controllers;

use App\Models\Applay;
use App\Models\Job;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    //
    public function profile()
    {
        $authUser=Auth::user();
        return view('EmployeeDashboard.profile')
        ->with('authUser',$authUser);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'address'=> ['required', 'string', 'min:4', 'max:30'],
            'gender'=> ['required', 'string','in:Male,Female'],
            'experince'=> ['required', 'string', 'min:4', 'max:300'],
            'bio'=> ['required', 'string', 'min:4','max:300']
        ]);

        $profile=Profile::where('user_id',Auth::user()->id)->first();
        $user=User::where('id',Auth::user()->id)->first();

       $profile->update([
            'address'=>$request->address,
            'gender'=>$request->gender,
            'experince'=>$request->experince,
            'bio'=>$request->bio
       ]);

       $user->update([
        'name'=>$request->name,
        'email'=>$request->email
       ]);

       return redirect()->back()->with('success-message','Your Information update successufly');
    }


    public function image(Request $request)
    {

        $profile=Profile::where('user_id',Auth::user()->id)->first();


        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('EmployeeImage');

            if ($profile->avatr) {
                Storage::delete($profile->avatr);
                $profile->avatr = $path;
                $profile->save();
            } else {
                $profile->avatr = $path;
                $profile->save();
            }
        }

        return redirect()->back()->with('success-message','Your Information update successufly');

    }


    public function coverPhoto(Request $request)
    {

        $profile=Profile::where('user_id',Auth::user()->id)->first();


        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->store('EmployeeCover');

            if ($profile->avatr) {
                Storage::delete($profile->coverPhoto);
                $profile->coverPhoto = $path;
                $profile->save();
            } else {
                $profile->coverPhoto = $path;
                $profile->save();
            }
        }

        return redirect()->back()->with('success-message','Your Information update successufly');

    }

    public function cv(Request $request)
    {
        $profile=Profile::where('user_id',Auth::user()->id)->first();


        if ($request->hasFile('cv')) {
            $path = $request->file('cv')->store('CVEmployee');

            if ($profile->resume) {
                Storage::delete($profile->resume);
                $profile->resume = $path;
                $profile->save();
            } else {
                $profile->resume = $path;
                $profile->save();
            }
        }

        return redirect()->back()->with('success-message','Your Information update successufly');
    }


    public function ApplayJobsEmployee()
    {
        $applays=Applay::with('job')
        ->where('user_id',Auth::user()->id)->get();

        return view('EmployeeDashboard.EmployeeApplayJobs')
        ->with('applays',$applays);
    }

    public function DeleteJobApplay($id)
    {
        $applay=Applay::findOrFail($id);
        $applay->delete();

        return redirect()->back()->with('success-message','Your Applay delete successufly');

    }


    public function AcceptJobEmployee()
    {
        $jobs=Job::where('user_id',Auth::user()->id)->get();
        
        return view('EmployeeDashboard.EmployeeAcceptJobs')
        ->with('jobs',$jobs);

    }


    public function DownloadCv($file)
    {
        $file_path = public_path('storage/CVEmployee/'.$file);
        return response()->download($file_path);
    }



}
