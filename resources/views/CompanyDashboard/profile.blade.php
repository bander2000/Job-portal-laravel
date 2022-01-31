@extends('CompanyDashboard.index')

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
            <form action="{{ route('company.updateProfile')  }}" method="POST">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Company Name</label>
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
                    placeholder="Company Address" value="{{ old('address',$authUser->company->address) }}" />
                    @error('address')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                   @enderror
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-6 pr-1">
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" required placeholder="At Leaset 10 Number"
                    placeholder="Company" value="{{ old('phone',$authUser->company->phone) }}">
                    @error('phone')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                   @enderror
                  </div>
                </div>
                <div class="col-md-6 pl-1">
                  <div class="form-group">
                    <label>website Link</label>
                    <input type="text" class="form-control" name="website" required
                    placeholder="Website Link" value="{{ old('website',$authUser->company->website) }}">
                    @error('website')
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
                    <label>Description</label>
                    <textarea rows="4" cols="80" class="form-control" 
                     placeholder="Here can be your description" 
                    name="description" required
                    value="{{ old('description',$authUser->company->description) }}">{{ old('description',$authUser->company->description) }}</textarea>
                    @error('description')
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
            @if ($authUser->company->coverPhoto)
              <img src="{{ asset('storage/'.$authUser->company->coverPhoto) }}" class="w-100" alt="coverletter"/>
            @else
            <img src="{{ asset('defualtImage/imageBackground.jpeg') }}" class="w-100" alt="coverletter"/>
            @endif
          </div>
          <div class="card-body">
            <div class="author">
              <a href="#">
                @if ($authUser->company->logo)
                <img src="{{ asset('storage/'.$authUser->company->logo) }}" class="avatar border-gray" alt="logo"/>
                @else
                <img src="{{ asset('defualtImage/logo.png') }}" class="avatar border-gray"  alt="logo"/>
                @endif
                <h5 class="title">{{ $authUser->name }}</h5>
              </a>
            </div>
            <p class="description text-center">
             @if ($authUser->company->description)
               {{ $authUser->company->description }}
             @else
               No Description
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
              Change your Logo
          </div>
          <div class="card-body">
            <form action="{{ route('company.logo') }}" method="POST" enctype="multipart/form-data">
             @csrf
              <input type="file" class="form-control" name="logo" />
              <button type="submit" class="btn btn-success mt-3">update</button>
            </form>
          </div>
        </div>


        <div class="card">
          <div class="card-header">
              Change Cover Photo
          </div>
          <div class="card-body">
            <form action="{{ route('company.coverPhoto') }}" method="POST" enctype="multipart/form-data">
             @csrf
              <input type="file" class="form-control" name="coverPhoto" />
              <button type="submit" class="btn btn-success mt-3">update</button>
            </form>
          </div>
        </div>


      </div>
    </div>
  </div>
@endsection