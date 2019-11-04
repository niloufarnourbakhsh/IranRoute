<nav class="nav-1">

    <div>

        <ul class="menu">
            <li><a href="{{url('/')}}">صفحه اصلی</a></li>
            <li><a href="{{url('gallery')}}">گالری </a></li>
            <li><a href="{{url('contact')}}"> تماس با ما</a></li>
            <li><a href="{{url('about')}}">درباره ی ما </a></li>

            @if(!Auth::user())
            <li>
                <a href=""><i class="fas fa-user"></i></a>


                <ul>
                    <li><a href="{{url('/register')}}">عضویت </a></li>
                    <li><a href="{{url('/login')}}">ورود </a></li>
                </ul>
            </li>
            @else
            <li>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </li>
                @endif
        </ul>
    </div>

    <div class="logo">
        <h1>
            <span><i class="fas fa-route"></i></span>IR
        </h1>

    </div>
</nav>
