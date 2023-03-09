<h1>Trang giỏ hàng</h1>
<?php
    echo '<pre>';
    print_r($cart);
    print_r($products->toArray());
    echo '</pre>';
?>
<form action="cap_nhat_gio_hang" method="post">
    @csrf
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tên SP</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiên</th>
            <th>Hành động</th>
        </tr>
        @foreach( $products as $product )
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <input type="number" name="quantity[{{$product->id}}]" value="{{ $cart[$product->id] }}">
            </td>
            <td> {{ number_format($cart[$product->id] * $product->price)  }} </td>
            <td> <a href="xoa_gio_hang/{{$product->id}}">Xóa</a> </td>
        </tr>
        @endforeach
    </table>
    <input type="submit" value="Cập nhật">
</form>
