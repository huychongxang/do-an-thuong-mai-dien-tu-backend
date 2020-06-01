<footer class="footer">
    <div class="bg2-with-mask space-35">
        <span class="black-mask color-mask"></span>
        <div class="container theme-container">
            <div class="row space-top-35">
                <aside class="col-md-6 col-sm-6">
                    <div class="footer-widget space-bottom-35">
                        <h3 class="footer-widget-title"><i class="fa fa-phone-square blue-color"></i> Liên hệ cửa hàng
                        </h3>
                        <div class="address">
                            <ul>
                                <li><i class="fa fa-phone blue-color"></i> <span> {!! $settings['phone'] !!} </span>
                                </li>
                                <li><i class="fa fa-envelope blue-color"></i> <a
                                        href="mailto:{!! $settings['email'] !!}">
                                        <span> {!! $settings['email'] !!} </span>
                                    </a></li>
                                <li><i class="fa fa-map-marker blue-color"></i> {!! $settings['address'] !!}
                                </li>
                            </ul>
                        </div>
                    </div>
                </aside>
                @auth()
                    <aside class="col-md-6 col-sm-6">
                        <div class="footer-widget space-bottom-35">
                            <h3 class="footer-widget-title"><i class="fa fa-user pink-color"></i> Tài khoản của tôi
                            </h3>
                            <ul>
                                <li><a href="{{route('page.account-info.edit')}}"> <i
                                            class="fa fa-angle-right pink-color"></i> Thông tin tài khoản</a></li>
                                <li><a href="{{route('page.password.edit')}}"> <i
                                            class="fa fa-angle-right pink-color"></i> Đổi mật khẩu</a></li>
                                <li><a href="{{route('page.address.edit')}}"> <i
                                            class="fa fa-angle-right pink-color"></i> Địa chỉ</a></li>
                                <li><a href="{{route('page.orders-history.index')}}"> <i
                                            class="fa fa-angle-right pink-color"></i> Lịch sử đơn hàng</a></li>
                            </ul>
                        </div>
                    </aside>
                @endauth

            </div>
        </div>
    </div>
</footer>
