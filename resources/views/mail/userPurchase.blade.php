<p>{{ $product->product_name }}を購入しました！ <br>
    お店に取りに行ってください!!<br><br>
    お店:{{$convini->convini_name}}<br>
    支店名:{{$convini->branch_name}}<br>
    住所:{{$convini->address}}<br><br>
    価格:{{$product->price}}円<br>
    賞味期限::{{$product->expiration_date}}
</p>
