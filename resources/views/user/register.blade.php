
@include('includes.header')
@include('includes.nav2')

<section class="home">

    <div class="container">

        <div class="right-side">

            <div class="form-wrap" >

                <h3>
                    <span class="logo"><i class="fa fa-users"></i></span>
                    عضویت در سامانه
                </h3>
                <div class="hr"></div>
                <div class="fix">



                    <form method="POST" action="{{ route('register') }}">

                        @csrf
                        <label for="name"> نام کاربری:</label>
                        <input name="name" type="text" id="name" value="{{old('name')}}" required autofocus>

                        @if($errors->first('name'))
                        <span class="alert-red">
                            {{$errors->first('name')}}
                        </span>
                        @endif
                        <label for="email">پست الکترونیکی:</label>

                        <input type="email" name="email" id="email" value="{{old('email')}}" required>

                        @if($errors->first('email'))
                            <span class="alert-red">
                                {{$errors->first('email')}}
                            </span>
                        @endif
                        <label for="password">رمز عبور: </label>
                        <input id="password" name="password" type="password">

                        @if($errors->first('password'))
                            <span class="alert-red">
                                {{$errors->first('password')}}
                            </span>
                         @endif
                        <label for="re-password">تکرار رمز عبور: </label>
                        <input type="password" name="password_confirmation" id="re-password">

                        @if($errors->first('password_confirmation'))

                            <span class="alert-red">
                                {{$errors->first('password_confirmation')}}
                            </span>
                        @endif
                        <button class="btn btn-color1" type="submit">عضویت</button>


                    </form>

                </div>

            </div>



        </div>

        <div class="left-side">


            <div class="pagephoto">

                <img src="{{url('img/tabiat-bridge4.jpg')}}" alt="" class="img-show">

            </div>
        </div>

    </div>
</section>

@include('includes.footer')




