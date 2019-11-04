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

        <h5>نظرات کاربران</h5>
        <div class="main">

            <table class="manager">

                <tr>
                    <th>کد</th>
                    <th>پیام</th>
                    <th>نام کابر</th>
                    <th>پست مربوطه</th>
                    <th>حذف</th>
                </tr>

                @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->body}}</td>
                    <td>{{$comment->user->name}}</td>
                    <td>
                        <a href="{{url('/showpost/'.$comment->post->slug)}}">
                            {!! str_limit($comment->post->body,100) !!}
                        </a></td>

                    <td class="delete">
                        <form action="{{url('/comment/delete/'.$comment->id)}}" method="POST">

                            @csrf
                            <input type="hidden" value="DELETE" name="_method">
                            <button>
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>

                    </td>


                </tr>
                @endforeach
            </table>

            <div class="admin-pagination-part">

                <div class="row">
                    <div class="col-sm-6 col-sm-offset-5">

                        {{$comments->render()}}
                    </div>
                </div>

            </div>


        </div>

    </div>

</section>


@include('includes.admin-footer')