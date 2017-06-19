{{--admin template--}}
@extends('includes.admin.master')

{{--page title--}}
@section('title', 'Update a Questionnaire')
{{--first title--}}
@section('title1', 'Update a Questionnaire')
{{--second title--}}
@section('title2', "$questionnaire->title")

@section('content')
    <div class="large-10 large-offset-1 columns">
        {{--checks the questionnaire variable is set--}}
        @if(isset($questionnaire))
            {{--Binds the form to the model--}}
            {!! Form::model($questionnaire, ['method' => 'PATCH', 'url' => 'admin/questionnaires/' . $questionnaire->id]) !!}

                {{--gets the questionnaire form--}}
                @include('includes.forms.questionnaire')

                <div class="large-5 large-offset-2 small-12 columns">
                    {{--submit button--}}
                    {!! Form::submit('Update Questionnaire', ['class' => 'button expand success']) !!}
                </div>

                <div class="large-5 small-12 columns">
                    {{--reset button--}}
                    {!! Form::reset('Reset Form', ['class' => 'button expand alert']) !!}
                </div>
            {{--closes the form--}}
            {!! Form::close() !!}
        @endif
    </div>
@endsection