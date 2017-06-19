{{--admin template--}}
@extends('includes.admin.master')

{{--page title--}}
@section('title', 'Results')
{{--first title--}}
@section('title1', "$questionnaire->title")

@section('content')
    {{--checks the questionnaire variable is set--}}
    @if(isset($questionnaire))
        {{--accesses each questionnaire question in turn--}}
        @foreach($questionnaire->question as $question)
            {{--number and title of the question--}}
            <h3>{{ $question->number . ". " . $question->title }}</h3>
            {{--checks the question type--}}
            @if($question->type == 0)
                {{--gets the results for a multiple choice question--}}
                @include('includes/admin/results/multiple')
            @elseif($question->type == 1)
                {{--gets the results for a text based question--}}
                @include('includes/admin/results/text')
            @endif
            <br>
        @endforeach
    @endif
@endsection