{{--admin template--}}
@extends('includes.admin.master')

{{--page title--}}
@section('title', 'Questions')
{{--first title--}}
@section('title1', 'Questions')
{{--second title--}}
@section('title2', "$questionnaire->title")

@section('content')
    {{--checks the questionnaire variable is set--}}
    @if (isset ($questionnaire))
        {{--column titles--}}
        <div class="row list-item">
            <div class="large-1 small-12 columns">
                <p class="title">#</p>
            </div>
            <div class="large-6 small-hidden columns">
                <p class="title">Title</p>
            </div>
            <div class="large-2 small-hidden columns">
                <p class="title">Type</p>
            </div>
            <div class="large-3 small-12 columns">
                {{--create question button--}}
                <a class="button expand success" href="{{ url("/admin/questions/create/$questionnaire->id") }}"><i class="fa fa-plus"></i> Add a Question</a>
            </div>
        </div>
        {{--accesses each question in turn--}}
        @foreach($questionnaire->question as $question)
            <div class="row list-item">
                <div class="large-1 small-12 columns">
                    {{--number of the question--}}
                    <p>{{ $question->number }}.</p>
                </div>
                <div class="large-6 small-12 columns">
                    {{--title of the question--}}
                    <p>{{ $question->title }}</p>
                </div>
                <div class="large-2 small-12 columns">
                    {{--checks the type of question--}}
                    @if($question->type == 0)
                        <p>Multiple Choice</p>
                    @elseif($question->type == 1)
                        <p>Text</p>
                    @endif
                </div>
                <div class="large-1 small-12 columns">
                    {{--view answers button--}}
                    <a class="button expand" title="View Answers" href="{{ url("/admin/questions/$question->id") }}"><i class="fa fa-search"></i></a>
                </div>
                <div class="large-1 small-12 columns">
                    {{--update question button--}}
                    <a class="button expand warning" title="Update Question" href="{{ url("/admin/questions/$question->id/edit") }}"><i class="fa fa-pencil-square-o"></i></a>
                </div>
                <div class="large-1 small-12 columns">
                    {{--delete question button--}}
                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.questions.destroy', $question->id]]) !!}
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'button expand alert', 'title' => 'Delete Question']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        @endforeach
    @else
        {{--no questions found--}}
        <p>No questions have been added yet, why not create one?</p>
    @endif
@endsection