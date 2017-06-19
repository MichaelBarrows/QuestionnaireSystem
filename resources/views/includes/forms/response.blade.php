{{--checks if the respondent_id variable is set--}}
@if(isset($respondent_id))
    {{--returns the respondent id--}}
    {{ Form::hidden('respondent_id', "$respondent_id") }}
@else
    {{--first respondent--}}
    {{ Form::hidden('respondent_id', "1") }}
@endif