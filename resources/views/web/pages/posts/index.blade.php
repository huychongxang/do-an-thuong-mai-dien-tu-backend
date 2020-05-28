@extends('web.layouts.master')
@section('content')
    @include('web.includes.breadcrumbs',[
   'title1'=>null,
   'title2'=>null,
   'title3'=>'Tin tức',
   'parent'=>[],
   'current'=>'Tin tức'
   ])

    <article class="container theme-container">
        <section class="blog-post-wrap">
            <div class="row">
            @include('web.pages.posts.sidebar')

            <!-- Posts Start -->
                <aside class="col-md-8 col-sm-8">
                    <div class="blog-post-wrap space-bottom-45">
                        @foreach($posts as $post)
                            <div class="blog-box">
                                <div class="blog-media">
                                    <img src="{{$post->image}}" alt="...">
                                </div>
                                <div class="blog-content">
                                    <a class="post-title" href="blog-single.html">{{$post->title}}</a>
                                    <ul class="post-meta">
                                        <li><span class="fa fa-user green-color"></span> <a
                                                href="#">{{$post->author->name}}</a></li>
                                        <li><span class="fa fa-clock-o pink-color"></span> <a
                                                href="#">{{$post->created_at->diffForHumans()}} </a>
                                        </li>
                                    </ul>
                                    <hr class="fullwidth-divider">
                                    <div class="post-detail">
                                        <p>{{$post->excerpt}}</p>
                                    </div>
                                    <div class="read-more">
                                        <a href="#" class="blue-btn btn"> Xem thêm <i class="fa fa-caret-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="light-bg sorter">
                            <div class="col-md-6 col-sm-12 show-items">
                                <span>Showing Items : {{$posts->firstItem()}} to {{$posts->lastItem()}} total {{$posts->total()}}</span>
                            </div>
                            <div class="col-md-6 col-sm-12 bottom-pagination text-right">
                                <div class="inline-block">
                                    <div class="pagination-wrapper">
                                        {{$posts->appends(request()->only(['term','month','year']))->links('web.layouts.paginate')}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <!-- Posts Ends -->
            </div>
        </section>
    </article>
@endsection
