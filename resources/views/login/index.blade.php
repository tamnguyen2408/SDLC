@extends('admin-login-layout')

@section('content')
<div class="col-lg-8">
    <div class="card-group d-block d-md-flex row">
      <div class="card col-md-7 p-4 mb-0">
        <div class="card-body">
          <h1>Login</h1>
          <p class="text-medium-emphasis">Sign In to your account</p>
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          @if (Session::has("loginFail"))
            <div class="alert alert-danger">
              <p>{{ Session::get("loginFail") }}</p>
            </div>
          @endif

          <form method="post" action="{{ route("admin.handle.login") }}">
            @csrf
            <div class="input-group mb-3"><span class="input-group-text">
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                </svg></span>
              <input class="form-control" type="text" placeholder="Username" name="username">
            </div>
            <div class="input-group mb-4"><span class="input-group-text">
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                </svg></span>
              <input class="form-control" type="password" placeholder="Password" name="password">
            </div>
            <div class="row">
              <div class="col-6">
                <button class="btn btn-primary px-4" type="submit">Login</button>
              </div>
              {{-- <div class="col-6 text-end">
                <button class="btn btn-link px-0" type="button">Forgot password?</button>
              </div> --}}
            </div>
          </form>
        </div>
      </div>
      {{-- <div class="card col-md-5 text-white bg-primary py-5">
        <div class="card-body text-center">
          <div>
            <h2>Sign up</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <button class="btn btn-lg btn-outline-light mt-3" type="button">Register Now!</button>
          </div>
        </div>
      </div> --}}
    </div>
</div>
@endsection