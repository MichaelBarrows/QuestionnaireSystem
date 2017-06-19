{{--public template--}}
@extends('includes.public.master')

{{--page title--}}
@section('title', 'Questionnaires')

@section('content')
    {{--checks the questionnaires variable is set--}}
    @if (isset ($questionnaires))
        {{--title--}}
        <div class="row list-item">
            <div class="large-12s small-hidden columns">
                <p class="title">Title</p>
            </div>
        </div>
        {{--accesses each questionnaire in turn--}}
        @foreach ($questionnaires as $questionnaire)
            <div class="row list-item">
                <div class="large-9 small-12 columns">
                    {{--questionnaire title--}}
                    <p>{{ $questionnaire->title }}</p>
                </div>
                <div class="large-3 small-12 columns">
                    {{--take questionnaire button--}}
                    <a class="button expand success" title="Take This Questionnaire" href="{{ url("questionnaire/$questionnaire->id") }}">Take this questionnaire</a>
                </div>
            </div>
        @endforeach
    @else
        {{--no questionnaires found--}}
        <p>No questionnaires have been added yet</p>
    @endif
@endsection