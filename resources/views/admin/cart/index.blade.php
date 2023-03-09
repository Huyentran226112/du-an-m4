<h1>Danh sách sản phẩm</h1>
<ul>
@foreach( $items as $item )
    <li>
        <h3> {{ $item->name }} - {{ $item->price }}  </h3>
        <form action="them_vao_gio" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{ $item->id }}">
            Số lượng: <input type="number" name="quantity">
            <button type="submit">Thêm vô giỏ</button>
        </form>
    </li>
@endforeach
</ul>
