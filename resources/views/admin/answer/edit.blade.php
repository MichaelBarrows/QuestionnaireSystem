@extends('includes.admin.master')

{{--Page title--}}
@section('title', 'Update an Answer')
{{--First title--}}
@section('title1', 'Update an Answer')
{{--Second title--}}
@section('title2', $answer->question->questionnaire->title . ": " .  $answer->question->title . " - " . $answer->title)

@section('content')
    {{--Form coontainer--}}
    <div class="large-10 large-offset-1 columns">
        {{--Checks the answer variable is set--}}
        @if(isset($answer))
            {!! Form::model($answer, ['method' => 'PATCH', 'url' => 'admin/answers/' . $answer->id]) !!}

                {{--Include the answer form--}}
                @include('includes.forms.answer')

                {{--Submit button--}}
                <div class="large-5 large-offset-2 small-12 columns">
                    {!! Form::submit('Update Answer', ['class' => 'button expand success']) !!}
                </div>

                {{--Reset button--}}
                <div class="large-5 small-12 columns">
                    {!! Form::reset('Reset Form', ['class' => 'button expand alert']) !!}
                </div>

            {{--Closes the form--}}
            {!! Form::close() !!}
        @endif
    </div>
@endsection