@extends('EmployeeDashboard.index')

@section('content')
<div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            @if (Session::has('success-message'))
              <div class="alert alert-success" role="alert">
                {{ Session::get('success-message') }}
              </div>
            @endif
            <h5 class="title">Edit Profile</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('employee.profile')  }}" method="POST">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>User Name</label>
                    <input type="text" class="form-control" placeholder="Company Nmae" required
                     name="name" required
                    value="{{ old('name',$authUser->name) }}" />

                    @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                   @enderror

                  </div>
                </div>
              </div>

                 <div class="row">
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
                    placeholder="Employee Address" value="{{ old('address',$authUser->profile->address) }}" />
                    @error('address')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                   @enderror
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-6 pr-1">
                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="dob" required placeholder="Birth Date"
                    placeholder="Birth Date" value="{{ old('dob',$authUser->profile->dob) }}">
                    @error('dob')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                   @enderror
                  </div>
                </div>
                <div class="col-md-6 pl-1">
                  <div class="form-group">
                    <label>Gender</label>
                    <select name="gender" class="form-control">
                        <option {{ $authUser->profile->gender=="Male" ? 'selected' : '' }}
                        value="Male">Male</option>
                        <option {{ $authUser->profile->gender=="Female" ? 'selected' : '' }}
                         value="Female">Female</option>
                    </select>
                    @error('gender')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                   @enderror
                  </div>
                </div>
              </div>
              {{-- <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                  </div>
                </div>
              </div> --}}
              {{-- <div class="row">
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" placeholder="City" value="Mike">
                  </div>
                </div>
                <div class="col-md-4 px-1">
                  <div class="form-group">
                    <label>Country</label>
                    <input type="text" class="form-control" placeholder="Country" value="Andrew">
                  </div>
                </div>
                <div class="col-md-4 pl-1">
                  <div class="form-group">
                    <label>Postal Code</label>
                    <input type="number" class="form-control" placeholder="ZIP Code">
                  </div>
                </div>
              </div> --}}
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Experince</label>
                    <textarea rows="4" cols="80" class="form-control" 
                     placeholder="Here can be your Experince" 
                    name="experince" required
                    value="{{ old('experince',$authUser->profile->experince) }}">{{ old('experince',$authUser->profile->experince) }}</textarea>
                    @error('experince')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                   @enderror
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Bio</label>
                    <textarea rows="4" cols="80" class="form-control" 
                     placeholder="Here can be your Bio" 
                    name="bio" required
                    value="{{ old('bio',$authUser->profile->bio) }}">{{ old('bio',$authUser->profile->bio) }}</textarea>
                    @error('bio')
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
      <div class="col-md-4">
        <div class="card card-user">
          <div class="image">
            @if ($authUser->profile->coverPhoto)
              <img src="{{ asset('storage/'.$authUser->profile->coverPhoto) }}" class="w-100" alt="coverletter"/>
            @else
            <img src="{{ asset('defualtImage/employeecover.jpg') }}" class="w-100" alt="coverletter"/>
            @endif
          </div>
          <div class="card-body">
            <div class="author">
              <a href="#">
                @if ($authUser->profile->avatr)
                <img src="{{ asset('storage/'.$authUser->profile->avatr) }}" class="avatar border-gray" alt="logo"/>
                @else
                <img src="{{ asset('defualtImage/personImage.png') }}" class="avatar border-gray"  alt="logo"/>
                @endif
                <h5 class="title">{{ $authUser->name }}</h5>
              </a>
            </div>
            <p class="description text-center">
             @if ($authUser->profile->experince)
               {{ $authUser->profile->experince }}
             @else
               No Experince
             @endif
            </p>

            <p class="description text-center">
              @if ($authUser->profile->bio)
                {{ $authUser->profile->bio }}
              @else
                No Bio
              @endif
             </p>


             <p class="description text-center">
              @if ($authUser->profile->resume)
                <a href="{{ route('employee.downloadcv',$authUser->profile->resume) }}">Your Cv</a>
              @else
                No CV
              @endif
             </p>
          </div>
          <hr>
          <div class="button-container">
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-facebook-f"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-twitter"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-google-plus-g"></i>
            </button>
          </div>
        </div>

        <div class="card">
          <div class="card-header">
              Change your Image
          </div>
          <div class="card-body">
            <form action="{{ route('employee.image') }}" method="POST" enctype="multipart/form-data">
             @csrf
              <input type="file" class="form-control" name="image" />
              <button type="submit" class="btn btn-success mt-3">update</button>
            </form>
          </div>
        </div>


        <div class="card">
          <div class="card-header">
              Change your Cover Photo
          </div>
          <div class="card-body">
            <form action="{{ route('employee.coverphoto') }}" method="POST" enctype="multipart/form-data">
             @csrf
              <input type="file" class="form-control" name="cover" />
              <button type="submit" class="btn btn-success mt-3">update</button>
            </form>
          </div>
        </div>


        <div class="card">
          <div class="card-header">
             Add CV
          </div>
          <div class="card-body">
            <form action="{{ route('employee.cv') }}" method="POST" enctype="multipart/form-data">
             @csrf
              <input type="file" class="form-control" name="cv" />
              <button type="submit" class="btn btn-success mt-3">Upload</button>
            </form>
          </div>
        </div>


      </div>
    </div>
  </div>
@endsection