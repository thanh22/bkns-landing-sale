@extends('app')
@section('content')
<main>
    @if ($message = Session::get('success'))
    <section class="cart__area pt-120 pb-150 bg-light-blue d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="container bg-cart">
            <div class="row text-center">
                <h2>Bạn đã đăng ký mua hàng thành công</h2>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <a href="{{ route('home') }}" class="text-line-under color-blue"> < Quay về trang chủ</a>
            </div>
        </div>
    </section>
    @else
    <section class="cart__area pt-120 pb-150 bg-light-blue">
        <div class="container bg-cart">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 pb-40">
                    <div class="font-26">Đơn hàng</div>
                    <hr>
                    <table class="table">
                        @foreach ($cartProducts as $product)
                            <tr>
                                <td width="60%">
                                    <span>{{ $product->name }}</span>
                                </td>
                                <td>
                                    1 tháng
                                </td>
                                <td class="text-end">
                                    <span>{{ number_format($product->discount ? (($product->cost /100)*$product->discount) : $product->cost) }}</span>đ
                                </td>
                            </tr>
                        @endforeach
                        
                    </table>
                    
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 pr-70 pr-0-mb">
                    <div class="font-26 mb-20">Thông tin đặt hàng</div>
                    <form action="{{ route('cart-checkout') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="inputFullName" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="inputFullName" name="full_name" placeholder="Họ và tên">
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="inputPhone" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="inputPhone" placeholder="Số điện thoại" name="phone">
                        </div>
                        <div class="mb-3">
                            <label for="inputAddress" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Địa chỉ" name="address">
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary">Thanh toán</button>
                            <a href="{{ route('home') }}" class="text-line-under color-blue"> < Quay về trang chủ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @endif
</main>
@endsection