@include('includes.header')
<header id="showcase">
    <div class="cover">
        @include('includes.nav')

        <div class="pos">

            <section id="gallery">


                @foreach($posts as $post)

                    @if($post->is_active==0)
                    <a href="{{url('/showpost/'.$post->slug)}}">
                        <div class="item">

                            <img src="{{url('/storage/'.$post->photos()->first()->photo)}}" alt="">

                            <div class="title">
                                {{$post->title}}
                            </div>
                            <p>
                                {!! str_limit($post->body,75) !!}
                            </p>

                        </div>
                    </a>
                    @endif
                @endforeach

                    <div class="pagination-part">

                        <div class="row">

                            <div class="col-sm-6 col-sm-offset-5">

                                {{$posts->render()}}

                            </div>

                        </div>

                    </div>

            </section>



        </div>

    </div>
</header>

</body>
</html>