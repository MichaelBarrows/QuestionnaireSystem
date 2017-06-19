{{--admin template--}}
@extends('includes.admin.master')

{{--page title--}}
@section('title', 'You do not have permission to view this page')

@section('content')
    {{--displays the error--}}
    <h2>You do not have permission to view or edit the requested questionnaire.</h2>
    <p>Please go back and try again</p>
@endsection