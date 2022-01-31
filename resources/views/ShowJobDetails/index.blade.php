@extends('Layout.index')

@section('content')
<main>

    <!-- Hero Area Start-->
    <div class="slider-area ">
    <div class="single-slider section-overly slider-height2 d-flex align-items-center"
     data-background="{{ asset('assets/img/hero/h1_hero.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>{{ $job->catogry->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Hero Area End -->
    <!-- job post company Start -->
    <div class="job-post-company pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <a href="{{ route('profile',$job->company->user->id) }}">
                                    <img src="{{ asset('assets/img/icon/job-list1.png') }}" alt="">
                                </a>
                            </div>
                            <div class="job-tittle">
                                <a href="{{ route('profile',$job->company->user->id) }}">
                                    <h4>{{ $job->company->user->name }}</h4>
                                </a>
                                <ul>
                                    {{-- <li>{{ $job->company->user->name }}</li> --}}
                                    <li><i class="fas fa-map-marker-alt"></i>{{ $job->company->address }}</li>
                                    <li>${{ round($job->minSalary,2) }} - ${{ round($job->maxSalary,2) }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                      <!-- job single End -->
                   
                    <div class="job-post-details">
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Job Title</h4>
                            </div>
                            <p>
                                {{ $job->title }}
                            </p>
                        </div>

                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Job Description</h4>
                            </div>
                            <p>
                                {{ $job->description }}
                            </p>
                        </div>
                        <div class="post-details2  mb-50">
                             <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Required Knowledge, Skills, and Abilities</h4>
                            </div>
                           {{-- <ul>
                               <li>System Software Development</li>
                               <li>Mobile Applicationin iOS/Android/Tizen or other platform</li>
                               <li>Research and code , libraries, APIs and frameworks</li>
                               <li>Strong knowledge on software development life cycle</li>
                               <li>Strong problem solving and debugging skills</li>
                           </ul> --}}
                           <p>
                               {{ $job->requiredKnowledge }}
                           </p>
                        </div>
                        <div class="post-details2  mb-50">
                             <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Education + Experience</h4>
                            </div>
                           {{-- <ul>
                               <li>3 or more years of professional design experience</li>
                               <li>Direct response email experience</li>
                               <li>Ecommerce website design experience</li>
                               <li>Familiarity with mobile and web apps preferred</li>
                               <li>Experience using Invision a plus</li>
                           </ul> --}}
                           <p>
                               {{ $job->education }}
                           </p>
                        </div>
                    </div>

                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4" id="JobOverView">
                    <div class="post-details3  mb-50">
                        @if (Session::has('success_message'))

                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success_message') }}
                        </div>

                        @endif
                       
                        <!-- Small Section Tittle -->
                       <div class="small-section-tittle">
                           <h4>Job Overview</h4>
                       </div>
                      <ul>
                          <li>Posted date : <span>{{ $job->created_at->format('d/m/Y') }}</span></li>
                          <li>Location : <span>{{ $job->location }}</span></li>
                          <li>Job nature : <span>Full time</span></li>
                          <li>Salary :  <span>$7,800 yearly</span></li>
                          <li>Last date : <span>{{ 
                          Carbon\Carbon::parse($job->lastDate)->format('d/m/y')
                           }}</span></li>
                           <li>Applay Employee : 
                             <span>
                               {{ $job->applay_count }}
                            </span>
                            </li>
                      </ul>

                      @if(Auth::user()->userType=='employee')

                      @if (Auth::user()->applay()->where('job_id',$job->id)->exists())

                      <div class="apply-btn2">
                        <button class="btn">You Applied :)</button>
                     </div>

                      @else

                      <div class="apply-btn2">
                        <form 
                        action="{{ route('applay.job') }}"
                         method="POST">
                         @csrf

                          <input type="hidden" name="jobId" value="{{ $job->id }}" />
                          <button class="btn" type="submit">Applay Now !</button>
                        </form>
                     </div>

                      @endif

                      @endif

                    

                   </div>
                   
                    <div class="post-details4  mb-50">
                        <!-- Small Section Tittle -->
                       <div class="small-section-tittle">
                           <h4>Company Information</h4>
                       </div>
                          <span>{{ $job->company->cName }}</span>
                          <p>
                              {{ $job->company->description }}
                          </p>
                        <ul>
                            <li>Name: <span>{{ $job->company->user->name }} </span></li>
                            <li>Web : <span> {{ $job->company->website }}</span></li>
                            <li>Email: <span>{{ $job->company->user->email }}</span></li>
                        </ul>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->

</main>
@endsection