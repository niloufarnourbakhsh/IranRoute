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

        <h5>ویرایش</h5>
        <div class="main">

            <div class="fix-admin">


                <div class="form-wrap admin">


                    <form action="{{url('admin/post/update/'.$post->id)}}" method="POST"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT"/>
                        @csrf
                        <label for="city">شهر</label>
                        <input type="text" id="city" name="city" value="{{$post->city->name}}">
                        <input type="hidden" name="cityId" value="{{$post->city->id}}">

                        @if($errors->first('city'))
                            <span class="alert-red">
                                {{$errors->first('city')}}
                            </span>
                        @endif
                        <label for="title">عنوان</label>
                        <input type="text" id="title" name="title" value="{{$post->title}}" >
                        @if($errors->first('title'))
                            <span class="alert-red">
                                {{$errors->first('title')}}
                            </span>
                         @endif
                        <label for="body">پست</label>
                        <textarea id="body" name="body">{{$post->body}}</textarea>

                        @if($errors->first('body'))
                            <span class="alert-red">
                                {{$errors->first('body')}}
                            </span>
                        @endif
                        <label for="food">غذاها</label>
                        <input type="text" id="food" name="food" value="{{$post->food}}">

                        <label for="sightseeing">جاهای دیدنی</label>
                        <input type="text" id="sightseeing" name="sightseeing" value="{{$post->sightseeing}}">


                        <label for="photos">اضافه کردن تصویر</label>
                        <input type="file" name="filename[]" id="photos" accept="image/*" multiple/>

                        <button class="btn btn-color1">ویرایش</button>
                    </form>

                </div>

            </div>

            <div class="image-part">
            @if(Session('existence'))

              {{Session('existence')}}


              @endif
                @foreach($post->photos as $photo)

                    <div class="delete-image">

                        <img src="{{url('/storage/'.$photo->photo)}}" alt="" class="img-size">

                        <form action="{{url('/admin/delete/photo/'.$photo->id)}}" method="POST">
                            @csrf
                            <input type="hidden" value="DELETE" name="_method">

                            <button class="click-delete" type="submit">
                                <i class="fas fa-minus-circle"></i>
                            </button>
                        </form>
                    </div>

                @endforeach
            </div>

        </div>

    </div>

</section>


@include('includes.admin-footer')