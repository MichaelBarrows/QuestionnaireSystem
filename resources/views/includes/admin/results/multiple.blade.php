<p>Type: <span class="type">Multiple Choice</span></p>
{{--initialises the variable with a value of zero (for counting--}}
<?php $questionResponseCount = 0; ?>
<!--column titles-->
<div class="row list-item">
    <div class="large-5 small-12 columns">
        <p class="title">Title</p>
    </div>
    <div class="large-1 small-12 columns">
        <p class="title">Rating</p>
    </div>
    <div class="large-5 large-offset-1 small-12 columns">
        <p class="title">Responses</p>
    </div>
</div>
{{--accesses each answer in turn--}}
@foreach($question->answer as $answer)
    <div class="row list-item">
        <div class="large-5 small-12 columns">
            {{--title of the answer--}}
            <p>{{ $answer->title }}</p>
        </div>
        <div class="large-1 small-12 columns">
            {{--rating of the answer--}}
            <p>{{ $answer->rating }}</p>
        </div>
        <?php
            // counts the number of times an answer occurs in the response table
            $responseCount = count($answer->response);
            // adds the response count for the answer to the overall response count for the question
            $questionResponseCount += $responseCount;
        ?>
        <div class="large-5 large-offset-1 small-12 columns">
            {{--prints the response count--}}
            <p>{{ $responseCount }}</p>
        </div>
    </div>
@endforeach
{{--prints the overall response count--}}
<p>Overall Responses: {{ $questionResponseCount }}</p>