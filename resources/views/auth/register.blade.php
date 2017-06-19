@extends('includes.public.master')

@section('title', "Register")

@section('content') <div class="row">
    <div class="large-10 large-offset-1 columns">
        <form class="" role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}
            <div class="row{{ $errors->has('name') ? ' has-error' : '' }}">
                <div class="large-2 small-12 columns">
                    <label for="name">Name</label>
                </div>
                <div class="large-10 small-12 columns">
                    <input id="name" type="text" name="name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="row{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="large-2 small-12 columns">
                    <label for="email">E-Mail Address</label>
                </div>
                <div class="large-10 small-12 columns">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="row{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="large-2 small-12 columns">
                    <label for="password">Password</label>
                </div>
                <div class="large-10 small-12 columns">
                    <input id="password" type="password" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="row{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <div class="large-2 small-12 columns">
                    <label for="password-confirm">Confirm Password</label>
                </div>
                <div class="large-10 small-12 columns">
                    <input id="password-confirm" type="password" name="password_confirmation">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="large-5 large-offset-2 columns">
                    <button type="submit" class="button expand success">
                        <i class="fa fa-btn fa-user"></i> Register
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection