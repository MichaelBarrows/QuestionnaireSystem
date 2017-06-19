{{--public template--}}
@extends('includes.public.master')

{{--page title--}}
@section('title', $question->questionnaire->title)

@section('content')
    {{--checks the question variable is set--}}
    @if(isset($question))
        {{--question number and title--}}
        <h3>{{ $question->number . ". " . $question->title }}</h3>
        {!! Form::open(['url' => '/question/']) !!}

            <div class="row">
                {{--form errors--}}
                @if (count($errors) > 0)
                    <div class="large-12 columns errors">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                {{--checks the question type--}}
                @if($question->type == 1)
                    {{--returns the text input field--}}
                    @include('includes.forms.response.text')
                @elseif($question->type == 0)
                    {{--accesses each answer in turn--}}
                    @foreach($question->answer as $answer)
                        {{--returns the multiple choice radio button--}}
                        @include('includes.forms.response.multiple')
                    @endforeach
                @endif
                {{--includes the hidden respondent_id field--}}
                @include('includes.forms.response')
            </div>
            <div class="large-6 small-12 columns">
                {{--submit button--}}
                {!! Form::submit('Next Question', ['class' => 'button expand success', 'title' => 'Submit']) !!}
            </div>
            <div class="large-6 small-12 columns">
                {{--reset button--}}
                {!! Form::reset('Reset Question', ['class' => 'button expand alert', 'title' => 'Reset']) !!}
            </div>
        {{--closes the form--}}
        {!! Form::close() !!}

        <div class="large-3 large-offset-9 columns">
            {{--delete responses button--}}
            {!! Form::open(['method' => 'DELETE', 'route' => ['question.destroy', $respondent_id]]) !!}
            {!! Form::button('<i class="fa fa-trash"></i> Delete My Responses', ['type' => 'submit', 'class' => 'button expand alert', 'title' => 'Delete My Responses']) !!}
            {!! Form::close() !!}
        </div>
    @endif
@endsection