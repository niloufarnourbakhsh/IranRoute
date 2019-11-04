@include('includes.admin-header')


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

        <h5> تصاویر</h5>
        <div class="main">

            <div class="photos-part">

                <div class="up-part">
                    <form action="">
                        <select>
                            <option>اهواز</option>
                            <option>شیراز</option>
                        </select>
                        <button class="btn2 btn-color1">نمایش تصاویر</button>
                    </form>

                </div>

                <div class="down-part">
                    <div class="img-size"></div>
                    <div class="img-size"></div>
                    <div class="img-size"></div>
                    <div class="img-size"></div>
                    <div class="img-size"></div>
                    <div class="img-size"></div>
                    <div class="img-size"></div>
                    <div class="img-size"></div>



                </div>



            </div>



        </div>

    </div>

</section>


@include('includes.admin-footer')