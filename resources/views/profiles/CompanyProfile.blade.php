@extends('Layout.index')


@section('content')
<div class="slider-area ">

    <div class="single-slider d-flex align-items-center" 
    style="height:300px;background-repeat: no-repeat;background-size:cover
    ;background-position:center
    ;background-image: 
    @if ($company->coverPhoto)
    url('{{ asset('storage/'.$company->coverPhoto) }}')
    @else
    url('{{ asset('defualtImage/companyProfile.jpeg') }}')
    @endif">
    </div>

    <div>

        @if ($company->logo)
        <img src="{{ 
            asset('storage/'.$company->logo)
         }}" style="width: 150px;height: 150px;border-radius: 50%;
         position: relative;top:-100px;left:40px;z-index: 1"/>
  
        @else

        <img src="{{ 
            asset('defualtImage/logo.png') 
         }}" style="width: 150px;height: 150px;border-radius: 50%;
         position: relative;top:-100px;left:60px;z-index: 1"/>

        @endif

    </div>
</div>

<div class="job-post-company pt-15 pb-120">
    <div class="container">
        <div class="row justify-content-between">
            <!-- Left Content -->
            <div class="col-xl-7 col-lg-8">
                <!-- job single -->
                <div class="single-job-items mb-50" style="padding: 20px 10px">
                    <div class="job-items">
                        {{-- <div class="company-img company-img-details">
                            <a href="#">
                                <img src="{{ asset('assets/img/icon/job-list1.png') }}" alt="">
                            </a>
                        </div> --}}
                        <div class="job-tittle">
                            <a href="#">
                                <h4>{{ $company->user->name }}</h4>
                            </a>
                            <ul class="mt-3">
                                
                                <li>
                                    <i class="fas fa-map-marker-alt">
                                    </i>
                                    @if ($company->address)
                                    {{ $company->address }}
                                    @else
                                     No Address   
                                    @endif
                                </li>
                                <li><i class="fas fa-globe">
                                    </i>
                                    @if ($company->website)
                                    {{ $company->website }}
                                    @else
                                     No website   
                                    @endif
                                </li>
                                <li>
                                    <i class="fas fa-mobile"></i>
                                    @if ($company->phone)
                                    {{ $company->phone }}
                                    @else
                                     No phone   
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                  <!-- job single End -->
               
                <div class="job-post-details">
                    <div class="post-details1 mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Company Description</h4>
                        </div>
                        <p>
                            @if ($company->description)
                            {{ $company->description }}
 
                            @else
                                No description
                            @endif
                        </p>
                    </div>
                </div>

            </div>
            <!-- Right Content -->
            <div class="col-xl-4 col-lg-4">
                <div class="post-details3  mb-50">
                    <!-- Small Section Tittle -->
                   <div class="small-section-tittle mb-5">
                       <h4>Latest 3 Jobs</h4>
                   </div>
                  {{-- <ul>
                      <li>Posted date : <span>{{ $job->created_at->format('d/m/Y') }}</span></li>
                      <li>Location : <span>{{ $job->location }}</span></li>
                      <li>Job nature : <span>Full time</span></li>
                      <li>Salary :  <span>$7,800 yearly</span></li>
                      <li>Last date : <span>{{ 
                      Carbon\Carbon::parse($job->lastDate)->format('d/m/y')
                       }}</span></li>
                  </ul>
                 <div class="apply-btn2">
                    <a href="#" class="btn">Apply Now</a>
                 </div> --}}
                 <div>
                     @forelse ($jobs as $job)

                     <div class="single-job-items" style="padding:0px">
                        <div class="job-items">
                            <div class="job-tittle">
                            <a href="{{ route('job.show',$job->id) }}">
                                <h4>{{ $job->title }}</h4>
                            </a>
                            <ul> 
                                <li><i class="fas fa-map-marker-alt"></i>{{ $job->location }}</li>
                                <li>${{ round($job->minSalary,2) }} - ${{ round($job->maxSalary,2) }}</li>
                                <li>{{ $job->type }}</li>
                            </ul>
                        </div>
                 </div>
                     </div>

                     @empty

                     No Job Yet :)

                     @endforelse
               </div>
                {{-- <div class="post-details4  mb-50">
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
               </div> --}}
            </div>
        </div>
    </div>
</div>

@endsection