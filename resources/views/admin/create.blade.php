@include('includes.admin-header')
@include('includes.tinyeditor')
<section class="manager">


    {{--navbar that is on the right--}}
    <aside>

        <ul>
            <li><a href="{{url('/admin')}}">صفحه اصلی</a></li>
            <li><a href="{{url('/admin/post/create')}}">افزودن مطب جدید</a></li>
            <li><a href="{{url('/admin/user')}}">مدیریت اعضا</a></li>
            <li><a href="{{url('/admin/message')}}">مدیریت پیام ها</a></li>

        </ul>
    </aside>

    <div class="manager-home">

        <h5>اضافه کردن پست جدید</h5>
        <div class="main">

            <div class="fix-admin">


                <div class="form-wrap admin">


                    <form action="{{route('create.post')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="city">شهر</label>
                        <input type="text" id="city" placeholder="شهر ..." name="city">

                        @if($errors->first('city'))
                            <span class="alert-red">
                                {{$errors->first('city')}}
                            </span>
                            @endif
                        <label for="title">عنوان</label>
                        <input type="text" id="title" placeholder="عنوان ..." name="title">
                        @if($errors->first('title'))
                            <span class="alert-red">
                                {{$errors->first('title')}}
                            </span>
                            @endif
                        <label for="body">پست</label>
                        <textarea id="body" placeholder="متن ..." name="body"></textarea>
                        @if($errors->first('body'))
                            <span class="alert-red">
                                {{$errors->first('body')}}
                            </span>
                        @endif
                        <label for="food">غذاها</label>
                        <input type="text" id="food" placeholder="غذاها ...." name="food">

                        <label for="sightseeing">جاهای دیدنی</label>
                        <input type="text" id="sightseeing" placeholder="جاهای دیدنی ..." name="sightseeing">

                        <label for="photos">اضافه کردن تصویر</label>
                        <input type="file" name="filename[]" id="photos" accept="image/*" multiple/>
                        @if($errors->first('filename'))
                            <span class="alert-red">
                                {{$errors->first('filename')}}
                            </span>
                        @endif

                        <button class="btn btn-color1">ذخیره</button>
                    </form>

                </div>

            </div>


        </div>

    </div>

</section>


@include('includes.admin-footer')