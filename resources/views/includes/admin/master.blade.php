{{--admin template--}}
{{--gets the admin header--}}
@include('includes.admin.header')

<div class="row">
    <div class="large-12 small-12 columns">
        {{--gets the first title--}}
        <h2>@yield('title1')</h2>
    </div>
    <div class="large-12 small-12 columns">
        {{--gets the second title--}}
        <h3>@yield('title2')</h3>
    </div>
    <section>
        {{--gets the content--}}
        @yield('content')
    </section>
</div>
{{--gets the footer--}}
@include('includes.admin.footer')