{{--Admin template--}}
@extends('includes.admin.master')

{{--Page title--}}
@section('title', 'Update a Question')
{{--First title--}}
@section('title1', 'Update a Question')
{{--Second title--}}
@section('title2', $question->questionnaire->title . ": " .  $question->title)

@section('content')
    <div class="large-10 large-offset-1 columns">
        {{--Checks the question variable is set--}}
        @if(isset($question))
            {{--Binds the form to the model--}}
            {!! Form::model($question, ['method' => 'PATCH', 'url' => 'admin/questions/' . $question->id]) !!}
                {{--Includes the form--}}
                @include('includes.forms.question')

                <div class="large-5 large-offset-2 small-12 columns">
                    {{--Submits the form--}}
                    {!! Form::submit('Update Question', ['class' => 'button expand success']) !!}
                </div>

                <div class="large-5 small-12 columns">
                    {{--Resets the form--}}
                    {!! Form::reset('Reset Form', ['class' => 'button expand alert']) !!}
                </div>
            {{--Closes the form--}}
            {!! Form::close() !!}
        @endif
    </div>
@endsection