<?php

namespace App\Http\Controllers;

use App\Models\Applay;
use App\Models\Company;
use App\Models\Job;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function __invoke($id)
    {
        $user=User::findOrFail($id);
        if($user->userType=='employee')
        {

            $profile=Profile::with('user')->where('user_id',$id)->first();
            $applays=Applay::with('job')->where('user_id',$id)->take(3)->get();

            return view('profiles.EmployeeProfile')
            ->with([
                'profile'=>$profile,
                'applays'=>$applays
            ]);
        }
        else
        {
            $company=Company::with('user')->where('user_id',$id)->first();
            $jobs=Job::where('company_id',$company->id)->take(3)->get();
            return view('profiles.CompanyProfile')
            ->with([
                'company'=>$company,
                'jobs'=>$jobs
            ]);
        }
    }
}
