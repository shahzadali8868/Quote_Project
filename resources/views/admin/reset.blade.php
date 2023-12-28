@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(session()->has('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{session()->get('error')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session()->get('success')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('change_password') }}">
                        @csrf
                        <div class="row mb-3 mt-3">
                            <label for="old_pass" class="col-md-4 col-form-label text-md-end">Old Password</label>

                            <div class="col-md-6">
                                <input id="old_pass" type="password" class="form-control" name="old_pass" value="{{ old('old_pass') }}" required >

                                @error('old_pass')
                                    <span class="text-danger" >
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="new_pass" class="col-md-4 col-form-label text-md-end">New Passwod</label>

                            <div class="col-md-6">
                                <input id="new_pass" type="password" class="form-control" name="new_pass" required >

                                @error('new_pass')
                                    <span class="text-danger" >
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="confirm_pass" class="col-md-4 col-form-label text-md-end">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="confirm_pass" type="password" class="form-control" name="confirm_pass" required >

                                @error('confirm_pass')
                                    <span class="text-danger" >
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
