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
                <aside class="col-md-8 col-sm-8 space-bottom-45">
                    <div class="blog-single-post-wrap">
                        <div class="blog-box">
                            <div class="blog-content">
                                <a class="post-title">{{$post->title}}</a>
                                <ul class="post-meta">
                                    <li><span class="fa fa-user green-color"></span> <a>{{$post->author->name}}</a></li>
                                    <li><span class="fa fa-clock-o pink-color"></span>
                                        <a>{{$post->created_at->diffForHumans()}} </a></li>
                                </ul>
                                <hr class="fullwidth-divider">
                                <div class="post-detail">
                                    {!! $post->body !!}
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
