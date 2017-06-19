{{--admin navigation--}}
<nav class="top-bar">
    <ul class="title-area">
        <li class="name">
            {{--site title--}}
            <h1><a href="{{ url("") }}">Questionnaires</a></h1>
        </li>
        {{--hamburger menu (responsive)--}}
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a>
        </li>
    </ul>
    <section class="top-bar-section">
        <ul class="left">
            <li class="divider"></li>
            <li><a href="{{ url('/') }}">Take a Questionnaire</a></li>
            <li class="divider"></li>
            <li><a href="{{ url('/admin/questionnaires') }}">Manage Questionnaires</a></li>
            <li class="divider"></li>
        </ul>
        {{--logged in user information and links--}}
        <ul class="right">
            <li class="divider"></li>
            <li><a href="#">{{ Auth::user()->name }} <span class="caret"></span></a></li>
            <li class="divider"></li>
            <li><a href="{{ url('/logout') }}">Logout</a></li>
            <li class="divider"></li>
        </ul>
    </section>
</nav>