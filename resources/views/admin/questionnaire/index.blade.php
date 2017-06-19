{{--admin template--}}
@extends('includes.admin.master')

{{--page title--}}
@section('title', 'Questionnaires')
{{--first title--}}
@section('title1', 'Questionnaires')

@section('content')
    {{--checks the questionnaires variable is set--}}
    @if (isset ($questionnaires))
        {{--titles for the columns--}}
        <div class="row list-item">
            <div class="large-8 large-offset-1 small-hidden columns">
                <p class="title">Title</p>
            </div>
            <div class="large-3 small-12 columns">
                {{--create questionnaire button--}}
                <a class="button expand success" href="{{ url("/admin/questionnaires/create") }}"><i class="fa fa-plus"></i> Add a Questionnaire</a>
            </div>
        </div>
        {{--accesses each questionnaire in turn--}}
        @foreach ($questionnaires as $questionnaire)
            <div class="row list-item">
                <div class="large-1 small-12 columns">
                    {{--checks if the questionnaire is public--}}
                @if($questionnaire->public == true)
                        {{--displays a green disabled button with an eye--}}
                        <a class="button expand success disabled" title="Visible" href="#"><i class="fa fa-eye"></i></a>
                    @else
                        {{--displays a red disabled button with an eye with line through--}}
                        <a class="button expand alert disabled" title="Hidden" href="#"><i class="fa fa-eye-slash"></i></a>
                    @endif
                </div>
                <div class="large-7 small-12 columns">
                    {{--title of the questionnaire--}}
                    <p>{{ $questionnaire->title }}</p>
                </div>
                <div class="large-1 small-12 columns">
                    {{--view questions button--}}
                    <a class="button expand" title="View Questions" href="{{ url("/admin/questionnaires/$questionnaire->id") }}"><i class="fa fa-search"></i></a>
                </div>
                <div class="large-1 small-12 columns">
                    {{--update questions button--}}
                    <a class="button expand warning" title="Update Questionnaire" href="{{ url("/admin/questionnaires/$questionnaire->id") }}/edit"><i class="fa fa-pencil-square-o"></i></a>
                </div>
                <div class="large-1 small-12 columns">
                    {{--delete questions button--}}
                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.questionnaires.destroy', $questionnaire->id]]) !!}
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'button expand alert', 'title' => 'Delete Questionnaire']) !!}
                    {!! Form::close() !!}
                </div>
                <div class="large-1 small-12 columns">
                    {{--view results button--}}
                    <a class="button expand success" title="View Results" href="{{ url("/admin/results/$questionnaire->id") }}"><i class="fa fa-bar-chart"></i></a>
                </div>
            </div>
        @endforeach
    @else
        {{--no questionnaires have been found--}}
        <p>No questionnaires have been added yet, why not create one?</p>
    @endif
@endsection