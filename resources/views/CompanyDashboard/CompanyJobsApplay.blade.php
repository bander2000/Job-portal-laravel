@extends('CompanyDashboard.index')


@section('content')
<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            @if (Session::has('success-message'))
            <div class="alert alert-success" role="alert">
              {{ Session::get('success-message') }}
            </div>
          @endif
            <h4 class="card-title"> Simple Table</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Name
                  </th>
                  <th>
                    Avater
                  </th>
                  <th>
                    CV
                  </th>
                  <th class="text-right">
                    Job Name
                  </th>
                  <th class="text-right">
                    Show Profile
                  </th>
                  <th class="text-right">
                    Accept
                  </th>
                </thead>
                <tbody>
                    @foreach ($applays as $applay)
                    <tr>
                        <td>
                          {{ $applay->user->name }}
                        </td>
                        <td>

                          @if ($applay->user->profile->avatr)
                          <img src="{{ assset($applay->user->profile->avatr) }}"
                            alt=""  style="width: 80px"/>
                          @else
                            <img src="{{ asset('defualtImage/personImage.png') }}"
                             alt=""  style="width: 80px"  />
                          @endif
                         
                        </td>

                        @if ($applay->user->profile->resume)
                        <td>
                          <a href="{{ route('employee.cv',$profile->resume) }}"
                            style="color: black"
                            >Download Cv
                          </a> 
                        </td>
                        @else
                         <td>
                           No Cv
                         </td>
                        @endif



                      
                          <td class="text-right">
                           {{ $applay->job->title }}
                          </td>

                          <td class="text-right">
                            <a href="{{ route('profile',$applay->user->id) }}">Show Profile</a>
                           </td>
                      
                       
                           @if (isset($applay->job->user_id))
                             <td>
                               Job Endeed :)
                             </td>
                           @else
                           <td class="text-right">

                            <form 
                            action="{{ route('accept.emplyee.applay') }}"
                             method="POST">
                             @csrf
      
                              <input type="hidden" name="jobId" value="{{ $applay->job->id }}" />
                              <input type="hidden" name="empId" value="{{ $applay->user_id }}" />
                              <button class="btn btn-success" type="submit">
                              <i class="fas fa-check"></i>
                            </button>
                            </form>

                           </td>
                           @endif

                      </tr>
                    @endforeach
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection