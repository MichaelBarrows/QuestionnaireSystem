@extends('includes.admin.master')

{{--Page title--}}
@section('title', 'Add an Answer')
{{--First title--}}
@section('title1', 'Add an Answer')
{{--Second title--}}
@section('title2', $question->questionnaire->title . ": " . $question->title)

@section('content')
    {{--Form container--}}
    <div class="large-10 large-offset-1 columns">
        {!! Form::open(['url' => 'admin/answers']) !!}
            {{--get the form--}}
            @include('includes.forms.answer')

            {{--Submit button--}}
            <div class="large-5 large-offset-2 small-12 columns">
                {!! Form::submit('Add Answer', ['class' => 'button expand success', 'title' => 'Submit']) !!}
            </div>

            {{--Reset button--}}
            <div class="large-5 small-12 columns">
                {!! Form::reset('Reset Form', ['class' => 'button expand alert', 'title' => 'Reset']) !!}
            </div>

        {{--Closes the form--}}
        {!! Form::close() !!}
    </div>
@endsection