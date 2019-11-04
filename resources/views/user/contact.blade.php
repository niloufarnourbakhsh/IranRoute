@include('includes.header')


@include('includes.nav2')

<section class="home">

    <div class="container">

        <div class="right-side">


            <div class="form-wrap">

                <h3>
                    برای تماس با من لطفا فرم زیر را پر کنید
                </h3>

                <div class="hr"></div>
                <div class="fix">
                    <form action="{{url('/contact')}}" method="POST">

                        @csrf
                        <label for="name">نام شما: </label>
                        <input type="text" name="name" id="name" value="{{old('name')}}">

                        @if($errors->first('name'))
                        <span class="alert-red">
                            {{$errors->first('name')}}
                        </span>
                        @endif
                        <label for="email">پست الکترونیکی:</label>
                        <input type="text" name="email" id="email" value="{{old('email')}}">
                        @if($errors->first('email'))
                            <span class="alert-red">
                            {{$errors->first('email')}}
                        </span>
                        @endif

                        <label for="message">متن پیام</label>
                        <textarea id="message" name="message">{{old('message')}}</textarea>
                        @if($errors->first('message'))
                            <span class="alert-red">
                            {{$errors->first('message')}}
                        </span>
                        @endif
                        <button class="btn btn-color1">ارسال پیام</button>
                    </form>
                </div>
            </div>


        </div>



        <div class="left-side">

            <div class="pagephoto">

                <img src="{{url('img/masouleh.jpg')}}" alt="" class="img-show">
            </div>

        </div>


    </div>



</section>

@include('includes.footer')