@extends('EmployeeDashboard.index')


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
                    Job Name
                  </th>
                  <th>
                    Company Name
                  </th>
                  <th>
                    Applay Date
                  </th>
                  <th class="text-right">
                    Show Job
                  </th>
                  <th class="text-right">
                   Delete Applay
                  </th>
                </thead>
                <tbody>
                    @foreach ($applays as $applay)
                    <tr>
                        <td>
                          {{ $applay->job->title }}
                        </td>
                        <td>

                     {{ $applay->job->company->user->name }}
                         
                        </td>

                        
                          <td>
                           {{ $applay->created_at->diffForHumans() }}
                          </td>
                      
                       

                         <td class="text-center">
                            <a  href="{{ route('job.show',$applay->job->id) }}" class="btn btn-success">
                              <i class="fas fa-eye"></i>  
                            </a>
                         </td>


                         <td class="text-center">

                          <form  action="{{ route('employee.deleteApplay',$applay->id) }}" method="POST">
                            @csrf
                            @method('delete')
                           
                            <button type="submit" class="btn btn-success">
                              <i class="fas fa-trash"></i>      
                            </button>

                          </form>

                       </td>

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