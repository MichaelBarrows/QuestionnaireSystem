{{--public template--}}
@include('includes.public.header')

<div class="row">
    <div class="large-12 small-12 columns">
        {{--gets the page title--}}
        <h1>@yield('title')</h1>
    </div>
</div>
<div class="row">
    {{--gets the page content--}}
    @yield('content')
</div>
{{--gets the public footer--}}
@include('includes.public.footer')