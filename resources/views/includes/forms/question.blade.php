{{--question form, with variable for the update form--}}
{{--returns any errors on this form--}}
@if (count($errors) > 0)
    <div class="large-12 columns errors">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
{{--checks if the question variable is set--}}
@if(isset($question))
    {{ Form::hidden('questionnaire_id', "$question->questionnaire_id") }}
    <div class="large-2 small-12 columns">
        {!! Form::label('questionnaire_name', 'Questionniare:') !!}
    </div>
    <div class="large-10 small-12 columns">
        {!! Form::text('questionnaire_name', $question->questionnaire->title, ['disabled' => 'disabled']) !!}
    </div>
{{--checks if the questionnaire variable is set--}}
@elseif(isset($questionnaire))
    {{ Form::hidden('questionnaire_id', "$questionnaire->id") }}
    <div class="large-2 small-12 columns">
        {!! Form::label('questionnaire_name', 'Questionniare:') !!}
    </div>
    <div class="large-10 small-12 columns">
        {!! Form::text('questionnaire_name', $questionnaire->title, ['disabled' => 'disabled']) !!}
    </div>
@endif

<div class="large-2 small-12 columns">
    {!! Form::label('number', 'Number:') !!}
</div>
{{--checks if the question_number variable is set--}}
@if(isset($question_number))
    <div class="large-10 small-12 columns">
        {!! Form::text('number', $question_number) !!}
    </div>
@else
    <div class="large-10 small-12 columns">
        {!! Form::text('number', null) !!}
    </div>
@endif

<div class="large-2 small-12 columns">
    {!! Form::label('title', 'Title:') !!}
</div>
<div class="large-10 small-12 columns">
    {!! Form::text('title', null) !!}
</div>

<div class="large-2 small-12 columns">
    {!! Form::label('type', 'Type') !!}
</div>
<div class="large-10 small-12 columns">
{!! Form::select('type', [0 => "Multiple Choice", 1 => "Text"]) !!}
</div>