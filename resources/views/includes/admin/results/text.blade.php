<p>Type: <span class="type">Text</span></p>
<!--titles-->
<div class="row list-item">
    <div class="large-12 small-12 columns">
        <p class="title">Responses</p>
    </div>
</div>

<div class="row">
    {{--accesses each answer in turn--}}
    @foreach($question->answer as $answer)
        <div class="large-6 small-12 columns text-answer">
            {{--title of the answer (the users input)--}}
            <p>{{ $answer->title }}</p>
        </div>
    @endforeach
</div>