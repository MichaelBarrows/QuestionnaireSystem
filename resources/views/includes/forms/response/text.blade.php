{{--text based answer field with hidden rating and question id fields--}}
<div class="large-10 large-offset-1 small-12 columns">
    {{ Form::text('title', "") }}
    {{ Form::hidden('rating', 0) }}
    {{ Form::hidden('question_id', $question->id) }}
</div>