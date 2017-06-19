{{--public template--}}
@extends('includes.public.master')

{{--page title--}}
@section('title', "Thank You")

{{--thank you page--}}
@section('content')
    <div class="row">
        <div class="large-12 small-12 columns">
            {{--questionnaire title--}}
            <p>Thank you for taking {{ $questionnaire->title }}.</p>
        </div>
        {{--delete responses button--}}
        <div class="large-3 small-12 columns">
            {!! Form::open(['method' => 'DELETE', 'route' => ['question.destroy', $respondent_id]]) !!}
            {!! Form::button('<i class="fa fa-trash"></i> Delete My Responses', ['type' => 'submit', 'class' => 'button expand alert', 'title' => 'Delete My Responses']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection