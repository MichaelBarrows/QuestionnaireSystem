{{--Admin template--}}
@extends('includes.admin.master')

{{--Page title--}}
@section('title', "Answers")
{{--First title--}}
@section('title1', 'Answers')
{{--Second title--}}
@section('title2', $question->questionnaire->title)

@section('content')
    {{--Checks the answers variable is set--}}
    @if (isset ($answers))
        {{--Column headings--}}
        <div class="row list-item">
            <div class="large-8 small-hidden columns">

                <p class="title">Title</p>
            </div>
            <div class="large-1 small-12 columns">
                <p class="title">Rating</p>
                </div>
            <div class="large-3 small-12 columns">
                {{--Create annswer button--}}
                <a class="button expand success" href="{{ url("/admin/answers/create/$question->id") }}"><i class="fa fa-plus"></i> Add an Answer</a>
            </div>
        </div>
        {{--For loop to access each answer--}}
        @foreach($answers as $answer)
            <div class="row list-item">
                <div class="large-8 small-12 columns">
                    {{--title of the answer--}}
                    <p>{{ $answer->title }}</p>
                </div>
                <div class="large-2 small-12 columns">
                    {{--rating of the answer--}}
                    <p>{{ $answer->rating }}</p>
                </div>
                <div class="large-1 small-12 columns">
                    {{--Update button--}}
                    <a class="button expand warning" title="Update Answer" href="{{ url("/admin/answers/$answer->id/edit") }}"><i class="fa fa-pencil-square-o"></i></a>
                </div>
                <div class="large-1 small-12 columns">
                    {{--Delete button--}}
                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.answers.destroy', $answer->id]]) !!}
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'button expand alert', 'title' => 'Delete Answer']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        @endforeach
    @else
        {{--No answers were found--}}
        <p>No answers have been added yet, why not create one?</p>
    @endif
@endsection