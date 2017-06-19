{{--multiple choice radio button with option name--}}
<div class="large-11 large-offset-1 small-12 columns">
    {{ Form::radio('answer_id', "$answer->id") }} {{$answer->title}}
</div>