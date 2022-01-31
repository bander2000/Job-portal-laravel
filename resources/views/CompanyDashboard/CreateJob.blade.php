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
          <h5 class="title">Create Job</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('company.StoreJob') }}" method="POST">
           
            @csrf

            <div class="row">
              <div class="col-md-12">

                <div class="form-group">
                  <label class="required">Job Name</label>
                  <input type="text" required
                  class="form-control" placeholder="Title" name="title"
                   value="{{ old('title') }}"
                   required
                  />
  
                  @error('title')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                 @enderror

                </div>
              </div>
            </div>

               {{-- <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" required
                   placeholder="Email" 
                  value="{{ old('email',$authUser->email) }}" />

                  @error('email')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                 @enderror

                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" class="form-control" name="address" required
                  placeholder="Company Address" value="{{ old('address',$authUser->company->address) }}" />
                  @error('address')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                 @enderror
                </div>
              </div>
            </div> --}}
            
            <div class="row">
              <div class="col-md-6 pr-1">
                <div class="form-group">
                  <label >Min Salary</label>
                  <input type="text" class="form-control"  name="minSalary"
                  placeholder="min Salary" value="{{ old('minSalary') }}" 
                  required />

                  @error('minSalary')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                 @enderror
                </div>
              </div>
              <div class="col-md-6 pl-1">
                <div class="form-group">
                  <label >Max Salary</label>
                  <input type="text" class="form-control"  name="maxSalary"
                  placeholder="max Salary" value="{{ old('maxSalary') }}" 
                  required />

                  @error('maxSalary')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                 @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="required">Job Address</label>
                  <input type="text" required
                  class="form-control" placeholder="Address" name="location"
                   value="{{ old('location') }}"
                   required
                  />
  
                  @error('location')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                 @enderror
                </div>
              </div>
            </div>

            <div class="row">

              <div class="col-md-4 pr-1">
                <div class="form-group">
                  <label >Job Type</label>
                  <select class="form-control" name="type" required>
                    <option value="" selected>select</option>
                    <option value="Full-Time" 
                    >full-time</option>
                    <option value="Partial-Time"
                   
                    >partial-time</option>
                    <option value="From-Home"
                  
                    >from-home</option>
                </select>

                @error('type')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
               @enderror
                </div>
              </div>

              <div class="col-md-4 px-1">
                <div class="form-group">
                  <label>Catogry Name</label>
                  <select class="form-control" name="catogry_id" required>
                    <option value="" selected>select</option>
                    @foreach ($cats as $cat)
                    <option value="{{ $cat->id }}" 
                   
                    >{{ $cat->name }}</option>
                    @endforeach
                   
                </select>
  
                @error('catogry_id')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
               @enderror
  
                </div>
              </div>

              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label class="required">Last Date</label>
                  <input type="date" required
                  class="form-control" placeholder="Last Date for Applay"
                   name="lastDate" value="{{ old('lastDate') }}"
                   required
                  />
  
                  @error('lastDate')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                 @enderror
  
                </div>
              </div>
            </div>

            <div class="row mt-5">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="required">Description</label>
                    <textarea class="form-control" rows="10"
                    name="description" required
                    value="{{ old('description') }}"
                     placeholder="Description">
                     {{ old('description') }}</textarea>
                    
                     @error('description')
                     <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
              </div>
            </div>


            <div class="row mt-5">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="required">Requirment</label>
                  <textarea class="form-control" rows="10"
                  name="requiredKnowledge" required
                  value="{{ old('requiredKnowledge') }}"
                   placeholder="requirment">
                   {{ old('requiredKnowledge') }}</textarea>
                  
                   @error('requiredKnowledge')
                   <div class="alert alert-danger mt-2">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>


            <div class="row mt-5">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="required">Education</label>
                    <textarea class="form-control" rows="10"
                    name="education" required
                    value="{{ old('education') }}"
                     placeholder="requirment">
                     {{ old('education') }}</textarea>
                    
                     @error('education')
                     <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-success mt-3">Save</button>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection