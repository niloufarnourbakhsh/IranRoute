@include('includes.header')

@include('includes.nav2')

<section class="home">


    <div class="container">

        <div class="right-side">

            <div class="form-wrap" >
                <h3>
                    <span class="logo"><i class="fa fa-user"></i></span>
                    ورود به سامانه
                </h3>
                <div class="hr"></div>

                <div class="fix">

                    <form action="{{route('login')}}" method="POST">

                        @csrf
                        <label for="username"> نام کاربری:</label>
                        <input name="name" type="text" id="username">

                        @if($errors->first('name'))
                           <span class="alert-red">
                               {{$errors->first('name')}}
                           </span>
                        @endif

                        <label for="password">رمز عبور: </label>
                        <input id="password" name="password" type="password">

                        @if($errors->first('password'))

                            <span class="alert-red">
                                {{$errors->first('password')}}
                            </span>
                        @endif

                        <button class="btn btn-color1">ورود</button>
                    </form>

                </div>

            </div>



        </div>
        <div class="left-side">


            <div class="pagephoto">

                <img src="{{url('img/tehran.png')}}" alt="" class="img-show">
            </div>

        </div>
    </div>



</section>
@include('includes.footer')