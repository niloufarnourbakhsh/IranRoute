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

        <h5 style="display: inline-block">مطالب</h5>

        @if(Session::has('delete_post'))

            <p class="success">{{session('delete_post')}}</p>

        @endif

        <div class="main">

            <table class="manager">
                <tr>
                    <th>کد</th>
                    <th>شهر</th>
                    <th>متن</th>
                    <th class="activation">فعال/ غیرفعال</th>
                    <th>مشاهده </th>
                    <th>ویرایش</th>
                    <th>حذف</th>
                    <th>تاریخ</th>

                </tr>


                @if(count($posts)>0)

                @foreach($posts as $post)
                <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->city->name}}</td>
                <td>
                {!!  str_limit($post->body,100) !!}


                </td>


                <td>
                    @if($post->is_active==0)
                        <form action="{{url('/admin/post/Approve/'.$post->id)}}" method="POST">

                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <input value="1" name="active" type="hidden">
                        <button class="btn btn-approve" type="submit">غیرفعال</button>
                        </form>

                      @else
                        <form action="{{url('/admin/post/Approve/'.$post->id)}}" method="POST">

                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <input value="0" name="active" type="hidden">
                            <button class="btn btn-approve" type="submit">فعال</button>
                        </form>

                    @endif
                </td>

                <td class="show-post">
                    <a href="{{url('/showpost/'.$post->slug)}}"><i class="fas fa-eye"></i></a>
                </td>
                <td class="edit">
                <a href="{{url('admin/post/edit/'.$post->id)}}"><i class="fas fa-edit"></i></a>
                </td>
                <td class="delete">

                <form action="{{url('admin/post/delete/'.$post->id)}}" method="post">

                @csrf
                <input type="hidden" value="DELETE" name="_method">

                <button type="submit" name="delete">
                <i class='fas fa-trash-alt'></i>
                </button>
                </form>

                </td>

                <td>{{$post->created_at->diffForHumans()}}</td>

                </tr>

                @endforeach

                @else
                <h3>هیچ پستی موجود نیست</h3>
                @endif


            </table>


            <div class="admin-pagination-part">


                <div class="row">
                    <div class="col-sm-6 col-sm-offset-5">

                        {{$posts->render()}}
                    </div>
                </div>

            </div>

        </div>

    </div>

</section>


@include('includes.admin-footer')