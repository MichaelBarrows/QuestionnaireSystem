@extends('includes.public.master')

@section('title', "Login")

@section('content')
    <div class="row">
        <div class="large-10 large-offset-1 columns">
            <form class="" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}

                <div class="row{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="large-2 small-12 columns">
                        <label for="email">E-Mail Address</label>
                    </div>

                    <div class="large-10 small-12 columns">
                        <input id="email" type="email" name="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="large-2 small-12 columns">
                        <label for="password" class="col-md-4 control-label">Password</label>
                    </div>

                    <div class="large-10 small-12 columns">
                        <input id="password" type="password" class="form-control" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="large-10 large-offset-2 small-12 columns">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="large-5 large-offset-2 small-12 columns">
                        <button type="submit" class="button expand success">
                            <i class="fa fa-btn fa-sign-in"></i> Login
                        </button>
                    </div>
                    <div class="large-5 small-12 columns">
                        <a class="button expand warning" href="{{ url('/password/reset') }}">
                            <i class="fa fa-unlock-alt"></i> Forgot Your Password?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
