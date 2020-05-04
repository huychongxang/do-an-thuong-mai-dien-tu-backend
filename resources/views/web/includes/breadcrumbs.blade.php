<!-- Breadcrumbs Start -->
<section class="breadcrumb-bg margin-bottom-80">
    <span class="gray-color-mask color-mask"></span>
    <div class="theme-container container">
        <div class="site-breadcrumb relative-block space-75">
            <h2 class="section-title">
                            <span>
                                <span class="funky-font blue-tag">{{$title1}} </span>
                                <span class="italic-font">{{$title2}}</span>
                            </span>
            </h2>
            <h3 class="sub-title"> {{$title3}}</h3>
            <hr class="dash-divider">
            <ol class="breadcrumb breadcrumb-menubar">
                <li><a href="{{route('home')}}">Trang chủ</a> >
                    @foreach($parent as $child)
                        <a href="{{$child['link']}}">{{$child['name']}}</a> >
                    @endforeach
                    <span class="blue-color">{{$current}} </span></li>
            </ol>
        </div>
    </div>
</section>
<!-- / Breadcrumbs Ends -->
