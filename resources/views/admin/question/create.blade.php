{{--Template--}}
@extends('includes.admin.master')

{{--Page title--}}
@section('title', 'Add a Question')
{{--First title--}}
@section('title1', 'Add a Question')
{{--Second title--}}
@section('title2', "$questionnaire->title")

@section('content')
    <div class="large-10 large-offset-1 columns">
    {{--Open the form--}}
    {!! Form::open(['url' => 'admin/questions']) !!}

        {{--Includes the form--}}
        @include('includes.forms.question')
        <div class="large-5 large-offset-2 small-12 columns">
            {{--Submit button--}}
            {!! Form::submit('Add Question', ['class' => 'button expand success']) !!}
        </div>

        <div class="large-5 small-12 columns">
            {{--Resets the form--}}
            {!! Form::reset('Reset Form', ['class' => 'button expand alert']) !!}
        </div>
    {{--Closes the form--}}
    {!! Form::close() !!}
    </div>
@endsection