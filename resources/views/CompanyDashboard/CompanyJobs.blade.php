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
            <a class="btn btn-success"
             href="{{ route('company.createJob') }}">
              <i class="fas fa-plus"></i>
            </a>
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Title
                  </th>
                  <th>
                    MinS
                  </th>
                  <th>
                    MaxS
                  </th>
                  <th class="text-right">
                    Type
                  </th>
                  <th class="text-right">
                   Edit
                  </th>
                  <th class="text-right">
                    Delete
                  </th>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                    <tr>
                        <td>
                          {{ $job->title }}
                        </td>
                        <td>
                          {{ round($job->minSalary,1) }} $
                        </td>
                        <td>
                         {{ round($job->maxSalary,1) }} $
                        </td>
                        <td class="text-right">
                          {{ $job->type }}
                        </td>
                        <td class="text-right">
                          @if (isset($job->user_id))
                           The Job Ended :)
                          @else
                          <a class="btn btn-success" 
                          href="{{ route('company.editJob',$job->id) }}">
                            <i class="fas fa-pencil-alt"></i>
                          </a>
                          @endif
                         </td>
                         <td class="text-right">
                           @if (isset($job->user_id))
                             The Job Ended :)
                           @else
                           
                           <form method="POST" action="{{ route('company.delteJob',$job->id) }}">
                            @csrf
                            @method('delete')
                             <button class="btn btn-success" type="submit">
                                 <i class="fas fa-trash"></i>
                             </button>
                           </form>

                           @endif
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