@extends('layout.app2')
@section('content')
  <div class="mt-5 mb-5 row justify-content-center">
    <div class="col-md-4 d-flex justify-content-center align-items-center card">
        <img class="w-50" src="images/image1.png" alt="welcome">
     </div>
    <div class="col-md-4 py-5 px-5">
    <div class="col-md-4 d-flex justify-content-center align-items-center">
        <img style="width: 210px; margin-left: 10rem;" src="images/image2.png" alt="welcome">
    </div>
        @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('login.action') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Username <span class="text-danger">*</span></label>
                <input class="form-control" type="username" name="username" value="{{ old('username') }}" />
            </div>
            <div class="mb-3">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password" />
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
  </div>
@endsection
