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

        <h5 style="display: inline-block">مدیریت اعضا   </h5>
        @if(Session::has('delete_user'))

            <p class="success">{{session('delete_user')}}</p>
        @endif
        <div class="main">

            <table class="manager">
                <tr>
                    <th>کد</th>
                    <th>نام کاربری</th>
                    <th>ایمیل</th>
                    <th>حذف</th>

                </tr>


                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>

                    <td class="delete">

                        <form action="{{url('/user/delete/'.$user->id)}}" method="post">
                            
                            @csrf
                            <input type="hidden" value="DELETE" name="_method">

                            <button type="submit" name="delete">
                                <i class='fas fa-trash-alt'></i>
                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </table>


            <div class="admin-pagination-part">

                <div class="row">
                    <div class="col-sm-6 col-sm-offset-5">

                        {{$users->render()}}
                    </div>
                </div>

            </div>
        </div>

    </div>

</section>


@include('includes.admin-footer')