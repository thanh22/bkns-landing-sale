@extends('app')
@section('content')

<main>
    <!-- page title area start -->
    <section 
        class="page__title-area page__title-height d-flex align-items-center" 
        data-background="{{ $banner 
            ? url('storage/banners/'.$banner->image)
            : 'assets/img/banner/banner.png' }}"
    >
    </section>
    <!-- page title area end -->

    <!-- about area start -->
    <section class="about__area pt-120 pb-100">
        <div class="container">
            <div class="row text-center">
                <div class="d-flex justify-content-center">
                    <img src="assets/img/page-title/title.png" alt="">
                </div>
                <div class="promotion-sub-title mt-2">
                    <span>Chương trình khuyến mãi diễn ra hàng tuần tại BKNS</span>
                </div>
            </div>

            @foreach ($promotions as $promotion)
                @include('widgets.promotion', [
                    'imagePosition' => $promotion->image_position,
                    'image' => $promotion->image,
                    'content' => $promotion->content
                ])
            @endforeach
        </div>
    </section>
    <!-- about area end -->

    <!-- brand area start -->
    <section class="brand__area pb-110">
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-center">
                    <img src="assets/img/brand/all-product-title.png" alt="">
                </div>
                <div class="d-flex justify-content-center">
                    <span class="promotion-sub-title mt-2">Từ dịch vụ best seller cho đến dịch vụ mới ra mắt</span>
                </div>
            </div>

            <div class="tab d-flex justify-content-center flex-wrap pt-50">
                @foreach ($categories as $cate)
                    <button class="tablinks width-230" onclick="openService(event, 'cate_{{$cate->id}}')" id="defaultOpen"><img src="{{ url('storage/categories/'.$cate->image) }}" alt=""></button>
                @endforeach
            </div>

            @foreach ($categories as $cate)
            <div id="cate_{{$cate->id}}" class="tabcontent pt-50">          
                <div class="container owl-carousel owl-theme">
                    <!-- <div class="row"> -->
                            @foreach ($cate->products as $prod)
                                <!-- <div class="col-sm-6 col-md-6 col-lg-3"> -->
                                    <div class="item item-tab">
                                        <div class="product__name text-center mb-10">{{$prod->name}}</div>
                                        <div class="product_description text-center mb-25">{{$prod->description}}</div>
                                        <div class="price__area text-center">
                                            <div class="d-flex align-items-center justify-content-between mb-15">
                                                <div class="cost">{{ number_format($prod->cost) }} VNĐ</div>
                                                <div class="btn-sale">Giảm giá {{$prod->discount}}%</div>
                                            </div>
                                            <div class="current-price">
                                                <span class="highlight-price">{{ number_format(($prod->cost / 100) * $prod->discount) }}</span> <span class="text-vnd">VNĐ/th</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="option__list style__show">
                                            @foreach ($prod->options as $option)
                                                <div class="option__item">
                                                    @if ($option->use_option == 1)
                                                        <div style="width: 48px;">
                                                            <img src="assets/img/icon/check.png" alt="">
                                                        </div>
                                                        
                                                    @else
                                                        <span style="width:48px; height:48px"></span>
                                                    @endif
                                                        
                                                    {{$option->name_option}}: <span class="text-line-through">{{$option->old_value_option}}</span> <span class="font-600 ml-2">{{$option->value_option}}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="d-flex justify-content-center" style="margin-top: -20px; height: 70px">
                                            @if ( count($prod->options) > 8 )
                                                <div style="width: 70px; height: 70px; cursor: pointer" class="show__more" id="bkc01">
                                                    <img src="assets/img/icon/chevron-down.png" alt="">
                                                </div>
                                            @endif
                                            
                                        </div>
                                        <div>
                                            <select name="" id="" class="select-month">
                                                @for ($i=1; $i<= 12; $i++)
                                                    <option value="{{$i}}">{{$i}}th x {{ number_format(($prod->cost / 100) * $prod->discount) }}đ = {{ number_format(($prod->cost / 100) * $prod->discount * $i) }}đ</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div>
                                            <a href="{{ route('add-cart', ['id' => $prod->id]) }}" class="btn-register btn btn-outline-info">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-cart-plus"></i>
                                            </span>
                                                Add to cart
                                            </a>
                                        </div>
                                    </div>
                                <!-- </div> -->
                            @endforeach
                    <!-- </div> -->
                </div>
            </div>
            @endforeach
            

            <div id="domain" class="tabcontent pt-50">
                <h3>domain</h3>
                <p>Paris is the capital of France.</p> 
            </div>

            <div id="vps" class="tabcontent pt-50">
                <h3>vps</h3>
                <p>Tokyo is the capital of Japan.</p>
            </div>
            <div id="email" class="tabcontent pt-50">
                <h3>email</h3>
                <p>Tokyo is the capital of Japan.</p>
            </div>
            <div id="server" class="tabcontent pt-50">
                <h3>server</h3>
                <p>Tokyo is the capital of Japan.</p>
            </div>
            <div class="row pt-60">
                <div class="container">
                        <div class="note-area style-italic">
                            <p stat>Lưu ý:</p>
                            <ul class="pl-50">
                                <li class="mb-1">
                                    Trên đây là <span class="text-highlight-black">bảng giá gốc</span>. Mỗi tuần sẽ có 
                                    <span class="text-highlight-black">khuyến mại sản phẩm</span> kèm theo 
                                    <span class="text-highlight-black">voucher giảm giá khác nhau</span>. 
                                    Khách hàng có thể lựa chọn gói dịch vụ phù hợp và áp dụng khuyến mại theo từng tuần. 
                                </li>
                                <li class="mb-1">Chương trình khuyến mại <span class="text-highlight-black">áp dụng trên giá gốc</span></li>
                                <li class="mb-1">Chương trình chỉ <span class="text-highlight-black">áp dụng cho ĐĂNG KÝ MỚI</span></li>
                                <li class="mb-1">Chương trình <span class="text-highlight-black">KHÔNG</span> áp dụng cho <span class="text-highlight-black">ĐẠI LÝ, GIA HẠN</span></li>
                                <li>Chương trình khuyến mại <span class="text-highlight-black">KHÔNG áp dụng đồng thời</span> với các chương trình khác</li>
                            </ul>
                        </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- brand area end -->

</main>

<!-- footer area start -->
<footer>
    <div class="footer__area footer-bg">
        <div class="footer__top pt-80 pb-20">
            <div class="container">
                <div class="row mb-40">
                    <div class="d-flex justify-content-center mb-20">
                        <img src="assets/img/events/register-text.png" alt="">
                    </div>
                    <p class="sale-text text-center">Khuyến Mại Giảm Giá Kịch Trần Tại BKNS</p>
                </div>
                <div class="row form-register">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6 d-flex justify-content-center align-items-center">
                                <form class="width-full">
                                    <div class="mb-3">
                                        <input type="text" name="name" class="form-control radius-12 height-50" placeholder="Họ và tên">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="phone" class="form-control radius-12 height-50" placeholder="Số điện thoại">
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" class="form-control radius-12 height-50" placeholder="Email">
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-select radius-12 height-50" aria-label="Default select example">
                                            <option selected>Dịch vụ</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-center pt-10">
                                        <button type="submit" class="btn btn-receive uppercase">đăng ký ngay</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 d-flex justify-content-around align-items-center">
                                <div>
                                    <img src="assets/img/events/image-form-register.png" alt="">
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-70">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="footer__widget mb-50">
                                <div class="footer__widget-head mb-22">
                                    <h3 class="footer__contact-title">{{$information->name}}</h3>
                                </div>
                                <div class="footer__widget-body">
                                    <table>
                                        @foreach ($address as $add)
                                            @if ($add)
                                                <tr>
                                                    <td width="5%">
                                                        <div class="icon-ft mr-2">
                                                            <img src="assets/img/icon/address.png" alt="">
                                                        </div>
                                                    </td>
                                                    <td class="pa-1">
                                                        <div class="footer__contact-detail">{{$add}}</div>
                                                    </td>
                                                </tr>
                                            @endif
                                            
                                        @endforeach
                                        <tr>
                                            <td>
                                                <div class="icon-ft mr-2">
                                                    <img src="assets/img/icon/phone.png" alt="">
                                                </div>
                                            </td>
                                            <td class="pa-1">
                                                <div class="footer__contact-detail text-line-under">{{$information->phone}}</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="icon-ft mr-2">
                                                    <img src="assets/img/icon/mail.png" alt="">
                                                </div>
                                            </td>
                                            <td class="pa-1">
                                                <div class="footer__contact-detail">Email liên hệ: <span class="text-line-under">{{$information->email}}</span></div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-2 offset-xxl-1 col-xl-2 offset-xl-1 col-lg-3 offset-lg-0 col-md-2 offset-md-1 col-sm-5 offset-sm-1" style="margin: 0 auto">
                            <div class="footer__widget mb-50">
                                <div class="footer__widget-body">
                                    <div>
                                        <img src="assets/img/about/qr.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="footer__widget mb-50">
                                <div class="footer__widget-head mb-22">
                                    <h3 class="footer__contact-title">Liên Hệ Với Chúng Tôi :</h3>
                                </div>
                                <div class="footer__widget-body">
                                    
                                    <div class="footer__social">
                                        <ul>
                                            <li><a href="{{$socialNetworks->face}}"><i class="social_facebook"></i></a></li>
                                            <li><a href="{{$socialNetworks->twitter}}" class="tw"><i class="social_twitter"></i></a></li>
                                            <li><a href="{{$socialNetworks->instagram}}" class="pin"><i class="social_instagram"></i></a></li>
                                            <li><a href="{{$socialNetworks->youtube}}" class="youtube"><i class="social_youtube"></i></a></li>
                                            <li><a href="{{$socialNetworks->pinterest}}" class="pin"><i class="social_pinterest"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
    </div>
</footer>
<!-- footer area end -->
@endsection
@section('script')
<script>
    function openService(evt, category) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(category).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
@endsection