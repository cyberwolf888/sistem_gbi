@extends('layouts.auth')

@section('content')
    <div class="widgets-container">
        <div>
            <h1 class="logo-name">GBI</h1>
        </div>
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">E-Mail Address</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label">Password</label>
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                @endif
            </div>
            <button class="btn aqua block full-width bottom15" type="submit">Login</button>
        </form>
        <p class="top15"> <small>Rock GBI is easy to use and customize &copy; 2016-2017</small> </p>
    </div>
@endsection
