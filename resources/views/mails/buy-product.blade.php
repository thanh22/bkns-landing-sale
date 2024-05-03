<h2>Có khách hàng đăng ký mua sản phẩm từ website</h2>
<p>------------------------------</p>
<p>Họ và tên: {{ $name }}</p>
<p>Email: {{ $email }}</p>
<p>Số điện thoại: {{ $phone }}</p>
<p>Địa chỉ: {{ $address }}</p>
<p>------------------------------</p>
<p>Sản phẩm:</p>
<table style="border: 1px solid; border-collapse: collapse;">
    <thead>
        <tr>
            <th style="border: 1px solid;">Tên</th>
            <th style="border: 1px solid;">Giá</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td style="border: 1px solid;padding: 8px">{{ $product->name }}</td>
                <td style="border: 1px solid;padding: 8px">{{ number_format($product->cost) }}đ</td>
            </tr>
        @endforeach
        
    </tbody>
</table>
