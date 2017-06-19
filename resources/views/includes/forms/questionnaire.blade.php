{{--returns errors on the title field--}}
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

{{--returns errors on the public field--}}
@if ($errors->has('public'))
    <div class="large-12 columns errors">
        <p>{{ $errors->first('public') }}</p>
    </div>
@endif

<div class="large-2 small-12 columns">
    {!! Form::label('public', 'Publicly available?:') !!}
</div>
<div class="large-10 small-12 columns">
    {{--checks if the questionnaire variable is set--}}
    @if(isset($questionnaire))
        {!! Form::select('public', [1 => "Yes", 0 => "No"], $questionnaire->public) !!}
    @else
        {!! Form::select('public', [1 => "Yes", 0 => "No"], null) !!}
    @endif
</div>

{{--checks if the user variable is set--}}
@if(isset($user))
    {{ Form::hidden('author_id', "$user->id") }}
    <div class="large-2 small-12 columns">
        {!! Form::label('author', 'Author:') !!}
    </div>
    <div class="large-10 small-12 columns">
        {!! Form::text('author', "$user->name ($user->email)", ['disabled' => 'disabled']) !!}
    </div>
@endif