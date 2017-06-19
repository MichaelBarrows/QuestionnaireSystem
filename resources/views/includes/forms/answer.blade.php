{{--admin answer form uses variables for the update form--}}
{{--checks if the answer variable is set--}}
@if(isset($question))
    <div class="large-2 small-12 columns">
        {!! Form::label('questionnaire_name', 'Questionniare:') !!}
    </div>
    <div class="large-10 small-12 columns">
        {!! Form::text('questionnaire_name', $question->questionnaire->title, ['disabled' => 'disabled']) !!}
    </div>

    <div class="large-2 small-12 columns">
        {{ Form::hidden('question_id', "$question->id") }}
        {!! Form::label('question_name', 'Question:') !!}
    </div>
    <div class="large-10 small-12 columns">
        {!! Form::text('question_name', $question->title, ['disabled' => 'disabled']) !!}
    </div>
{{--checks if the answer variable is set--}}
@elseif(isset($answer))
    <div class="large-2 small-12 columns">
        {!! Form::label('questionnaire_name', 'Questionniare:') !!}
    </div>
    <div class="large-10 small-12 columns">
        {!! Form::text('questionnaire_name', $answer->question->questionnaire->title, ['disabled' => 'disabled']) !!}
    </div>

    <div class="large-2 small-12 columns">
        {{ Form::hidden('question_id', $answer->question->id) }}
        {!! Form::label('question_name', 'Question:') !!}
    </div>
    <div class="large-10 small-12 columns">
        {!! Form::text('question_name', $answer->question->title, ['disabled' => 'disabled']) !!}
    </div>
@endif
{{--returns any errors in the title field--}}
@if ($errors->has('title'))
    <div class="large-12 columns errors">
        <p>{{ $errors->first('title') }}</p>
    </div>
@endif

<div class="large-2 small-12 columns">
    {!! Form::label('title', 'Title:') !!}
</div>
<div class="large-10 small-12 columns">
    {!! Form::text('title', null) !!}
</div>

{{--returns any errors in the rating field--}}
@if ($errors->has('rating'))
    <div class="large-12 columns errors">
        <p>{{ $errors->first('rating') }}</p>
    </div>
@endif

<div class="large-2 small-12 columns">
    {!! Form::label('rating', 'Rating:') !!}
</div>
<div class="large-10 small-12 columns">
    {!! Form::text('rating', null) !!}
</div>