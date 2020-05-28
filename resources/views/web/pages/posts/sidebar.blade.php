<!-- Sidebar Start -->
<aside class="col-md-4 col-sm-4">
    <div class="blog-sidebar-widget light-bg default-box-shadow">
        <h4 class="widget-title pink-bg"><span>  Danh mục  </span></h4>
        <div class="blog-widget-content">
            <ul>
                @foreach($categories as $category)
                    <li class="cat-item"><a
                            href="{{route('page.post.index',['category_id'=>$category->id])}}">{{$category->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="blog-sidebar-widget light-bg default-box-shadow">
        <h4 class="widget-title golden-bg"><span> Archives </span></h4>
        <div class="blog-widget-content">
            <ul>
                @foreach($archives as $archive)
                    <li class="arch-item"><a
                            href="{{route('page.post.index',['month'=>$archive->month,'year'=>$archive->year])}}">{{$archive->month}} {{$archive->year}} </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</aside>
<!-- / Sidebar Ends -->
