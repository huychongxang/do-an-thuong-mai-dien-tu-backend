<section id="home-blog" class="space-35">
    <div class="light-bg space-35">
        <div class="container theme-container">
            <div class="blog-wrap space-top-35">
                <div class="title-wrap with-border">
                    <h2 class="section-title with-border">
                                    <span class="light-bg">
                                        <span class="italic-font">Tin tức</span>
                                    </span>
                    </h2>
                    <hr class="dash-divider">
                </div>
                <div class="row">
                    @foreach($newPosts as $key => $post)
                        @if($key == 0)
                            <div class="col-md-4 col-sm-6">
                                <div class="post-wrap">
                                    <div class="post-media">
                                        <img src="{{$post->image}}" alt=" ">
                                    </div>
                                    <div class="bg2-with-mask green-box-shadow">
                                        <span class="green-color-mask color-mask"></span>
                                        <div class="post-content">
                                            <a href="blog-single.html" class="post-title">{{$post->title}}</a>
                                            <ul class="post-meta">
                                                <li><span class="fa fa-user"></span> <a
                                                        href="#">{{$post->author->name}}</a>
                                                </li>
                                                <li><span class="fa fa-clock-o"></span> <a
                                                        href="#">{{$post->created_at->diffForHumans()}} </a></li>
                                            </ul>
                                            <div class="post-detail">
                                                <p>{{$post->excerpt}}</p>
                                            </div>
                                            <div class="read-more">
                                                <a class="title-link" href="{{route('page.post',$post->slug)}}"> Xem
                                                    thêm <i
                                                        class="fa fa-caret-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($key == 1)
                            <div class="col-md-4 col-sm-6">
                                <div class="post-wrap">
                                    <div class="post-media">
                                        <img src="{{$post->image}}" alt=" ">
                                    </div>
                                    <div class="bg2-with-mask pink-box-shadow">
                                        <span class="pink-color-mask color-mask"></span>
                                        <div class="post-content">
                                            <a href="blog-single.html" class="post-title">{{$post->title}}</a>
                                            <ul class="post-meta">
                                                <li><span class="fa fa-user"></span> <a
                                                        href="#">{{$post->author->name}}</a></li>
                                                <li><span class="fa fa-clock-o"></span> <a
                                                        href="#">{{$post->created_at->diffForHumans()}} </a></li>
                                            </ul>
                                            <div class="post-detail">
                                                <p>{{$post->excerpt}}</p>
                                            </div>
                                            <div class="read-more">
                                                <a class="title-link" href="{{route('page.post',$post->slug)}}"> Xem thêm <i
                                                        class="fa fa-caret-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-md-4 col-sm-6">
                                <div class="post-wrap">
                                    <div class="post-media">
                                        <img src="{{$post->image}}" alt=" ">
                                    </div>
                                    <div class="bg2-with-mask blue-box-shadow">
                                        <span class="blue-color-mask color-mask"></span>
                                        <div class="post-content">
                                            <a href="blog-single.html" class="post-title">{{$post->title}}</a>
                                            <ul class="post-meta">
                                                <li><span class="fa fa-user"></span> <a
                                                        href="#">{{$post->author->name}}</a></li>
                                                <li><span class="fa fa-clock-o"></span> <a
                                                        href="#">{{$post->created_at->diffForHumans()}} </a></li>
                                            </ul>
                                            <div class="post-detail">
                                                <p>{{$post->excerpt}}</p>
                                            </div>
                                            <div class="read-more">
                                                <a class="title-link" href="{{route('page.post',$post->slug)}}"> Xem thêm <i
                                                        class="fa fa-caret-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endforeach


                </div>
            </div>
        </div>
    </div>
</section>
