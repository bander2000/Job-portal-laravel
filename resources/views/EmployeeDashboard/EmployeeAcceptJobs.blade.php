@extends('EmployeeDashboard.index')


@section('content')
<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Simple Table</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Job Title
                  </th>
                  <th>
                    Min Salary
                  </th>
                  <th>
                    Max Salary
                  </th>
                  <th class="text-right">
                    Job Type
                  </th>
                  <th class="text-right">
                    Company Name
                  </th>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                    <tr>
                        <td>
                          {{ $job->title}}
                        </td>
                        

                      
                          <td>
                           {{ round($job->minSalary,3) }} $
                          </td>
                      
                       

                         <td>
                          {{ round($job->maxSalary,3) }} $
                         </td>

                         <td class="text-right">
                            {{ $job->type }} 
                           </td>


                           <td class="text-center">
                            {{ $job->company->user->name }} 
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