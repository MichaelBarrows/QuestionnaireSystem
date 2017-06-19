{{--public navigation--}}
<nav class="top-bar">
    <ul class="title-area">
        <li class="name">
            {{--site title--}}
            <h1><a href="{{ url("") }}">Questionnaires</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a>
        </li>
    </ul>
    <section class="top-bar-section">
        <ul class="left">
            <li class="divider"></li>
            <li><a href="{{ url("") }}">Take a Questionnaire</a></li>
            <li class="divider"></li>
        </ul>
        {{--login and register links--}}
        <ul class="right">
            <li class="divider"></li>
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li class="divider"></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
            <li class="divider">
        </ul>
    </section>
</nav>