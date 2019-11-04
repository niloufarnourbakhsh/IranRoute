@include('includes.header')


@include('includes.nav2')



    <section class="home">

        <div class="post-box">


            <div class="posts">


                <div class="topic">{{$post->title}}</div>
                <div class="concept">
                        {!! $post->body !!}
                </div>

                @if($post->food)
                <div class="topic">
                    غذا
                </div>
                <div class="concept">

                    {{$post->food}}

                </div>
                @endif

                @if($post->sightseeing)
                <div class="topic">جاهای دیدنی</div>
                <div class="concept">

                    {{$post->sightseeing}}

                </div>
                  @endif
            </div>

            <div class="images">


                @foreach($post->photos as $photo)
                <img src="{{url('/storage/'.$photo->photo)}}" alt="" class="post-photo">


                  @endforeach

            </div>

            <div class="clr"></div>


        </div>
    </section>



    <section class="leave-comment">

        <div class="container">


            <div class="form-wrap" >
                <h6>
                    <i class="fas fa-comments"></i>
                    ارسال نظر

                </h6>


                <div class="fix">

                    <form action="{{url('/comment/create')}}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{$post->id}}">

                        @if(!Auth::check())

                            <span>ارسال نظر فقط برای اعضای سایت امکان پذیر است</span>

                        <textarea class="gray" disabled ></textarea>

                        @else

                             <textarea name="body" maxlength="255"></textarea>

                                 @if($errors->first('body'))
                                 <span class="alert-red">

                                     {{$errors->first('body')}}

                                   </span>
                                 @endif
                        @endif
                        <button class="btn btn-color1" type="submit">ارسال</button>
                    </form>

                </div>

            </div>

        </div>

    </section>


    <div class="clr"></div>



<section class="comments">

    <div class="head-comment">
        <p>
            نظرات
        </p>
    </div>


    @foreach($comments as $comment)

        <div class="comment">

            <h5>
                {{$comment->user->name}}
            </h5>

            <p>
            {{$comment->body}}
            </p>


            @if(Auth::check())

                @if($comment->user_id == Auth::id() || Auth::user()->role_id==1)
                    <div>
                        <form action="{{url('/comment/delete/'.$comment->id)}}" method="POST">

                            @csrf
                            <input type="hidden" value="DELETE" name="_method">

                            <button>
                                <i class="far fa-times-circle"></i>
                            </button>
                        </form>
                    </div>
                @endif

            @endif

        </div>
    @endforeach


    <div class="pagination-part">

        <div class="row">
            <div class="col-sm-6 col-sm-offset-5">

                {{$comments->render()}}
            </div>
        </div>

    </div>



</section>

@include('includes.footer')