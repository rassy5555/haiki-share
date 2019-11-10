<p>{{ $product->product_name }}を商品を購入しました！ <br>
    お店に取りに行ってください!!<br><br>
    お店:{{$convini->convini_name}}　{{$convini->branch_name}}店<br>
    住所:{{$convini->address}}<br><br>
    価格:{{$product->price}}円
    賞味期限::{{$product->expiration_date}}
</p>
