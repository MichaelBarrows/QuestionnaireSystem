{{--Admin template--}}
@extends('includes.admin.master')

{{--Page title--}}
@section('title', 'Add a Questionnaire')
{{--First title--}}
@section('title1', 'Add a Questionnaire')

@section('content')
    <div class="large-10 large-offset-1 columns">
        {{--Opens the form--}}
        {!! Form::open(['url' => 'admin/questionnaires']) !!}

        {{--Gets the questionnaire form--}}
        @include('includes.forms.questionnaire')

        <div class="large-5 large-offset-2 small-12 columns">
            {{--Submit button--}}
            {!! Form::submit('Add Questionnaire', ['class' => 'button expand success']) !!}
        </div>

        <div class="large-5 small-12 columns">
            {{--Resets the form--}}
            {!! Form::reset('Reset Form', ['class' => 'button expand alert']) !!}
        </div>

    {{--Closes the form--}}
    {!! Form::close() !!}
    </div>
@endsection