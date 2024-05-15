@extends('layouts.master')

@section('content')
      <div class="content">
        <form method="post" action="/userprofile/update{{ auth()->user()->id }}" enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h5 class="title">Edit Profile</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-5 pr-1">
                        <div class="form-group">
                          <label>Company (disabled)</label>
                          <input type="text" class="form-control" disabled="" placeholder="Company" value="Creative Code Inc.">
                        </div>
                      </div>
                      <div class="col-md-3 px-1">
                        <div class="form-group">
                          <label for="username" class="form-label">Username</label>
                          <input id="username" name="username" type="text" class="form-control" placeholder="Username" value="{{ $user->username }}">
                        </div>
                      </div>
                      <div class="col-md-4 pl-1">
                        <div class="form-group">
                          <label class="form-label" for="email">Email address</label>
                          <input id="email" name="email" type="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 pr-1">
                        <div class="form-group">
                          <label class="form-label" for="first_name">First Name</label>
                          <input id="first_name" name="first_name" type="text" class="form-control" placeholder="Company" value="{{ $user->first_name }}">
                        </div>
                      </div>
                      <div class="col-md-6 pl-1">
                        <div class="form-group">
                          <label class="form-label" for="last_name">Last Name</label>
                          <input id="last_name" name="last_name" type="text" class="form-control" placeholder="Last Name" value="{{ $user->last_name }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="form-label" for="address">Address</label>
                          <input id="address" name="address" type="text" class="form-control" placeholder="Home Address" value="{{ $user->address }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 pr-1">
                        <div class="form-group">
                          <label class="form-label" for="city">City</label>
                          <input id="city" name="city" type="text" class="form-control" placeholder="City" value="{{ $user->city }}">
                        </div>
                      </div>
                      <div class="col-md-4 px-1">
                        <div class="form-group">
                          <labe class="form-label" for="country">Country</label>
                          <input id="country" name="country" type="text" class="form-control" placeholder="Country" value="{{ $user->country }}">
                        </div>
                      </div>
                      <div class="col-md-4 pl-1">
                        <div class="form-group">
                          <label class="form-label" for="postal_code">Postal Code</label>
                          <input id="postal_code" name="postal_code" type="number" class="form-control" placeholder="" value="{{ $user->postal_code }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="form-label" for="about_me">About Me</label>
                          <textarea id="about_me" name="about_me" rows="4" cols="80" class="form-control" placeholder="Here can be your description" >{{ $user->about_me }}</textarea>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-user">
                <div class="image">
                  <img src="../assets/img/bg5.jpg" alt="...">
                </div>
                <div class="card-body">
                  <div class="author">
                    <input type="hidden" id="oldImage" name="oldImage" value="{{ $user->image }}">
                    @if ($user->image)
                      <img class="avatar border-gray" src={{ asset("storage/".$user->image) }} class="card-img-top">
                    @else
                      <img class="avatar border-gray" src={{ asset("storage/avatar-3814049_1920.png") }} class="card-img-top">
                    @endif
                    <input class="form-control" name="image" type="file" id="image" hidden>
                    <label class="form-label" for="image"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"></path>
                    </svg></label>
                      <h5 class="title">{{ $user->first_name }} {{ $user->last_name }}</h5>
                    <p class="description">
                      {{ $user->username }}
                    </p>
                  </div>
                  <p class="description text-center">{{ $user->about_me }}</p>
                </div>
        </form>
              {{-- <hr>
              <div class="button-container">
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-facebook-f"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-twitter"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-google-plus-g"></i>
                </button> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('scripts')
@endsection