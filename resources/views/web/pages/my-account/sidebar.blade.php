<aside class="col-md-4 col-sm-4 space-bottom-20">
    <div class="blog-sidebar-widget light-bg default-box-shadow">
        <h4 class="widget-title blue-bg"><span>  Tài khoản  </span></h4>
        <div class="blog-widget-content">
            <ul>
                <li class="accout-item"><a href="{{route('page.account-info.edit')}}"> Thông tin tài khoản </a></li>
                @if(auth()->user()->isNormailAccount())
                    <li class="accout-item"><a href="{{route('page.password.edit')}}">Đổi mật khẩu</a></li>
                @endif
                <li class="accout-item"><a href="{{route('page.address.edit')}}">Địa chỉ</a></li>
                <li class="accout-item"><a href="{{route('page.orders-history.index')}}">Lịch sử đơn hàng</a></li>
            </ul>
        </div>
    </div>
</aside>
