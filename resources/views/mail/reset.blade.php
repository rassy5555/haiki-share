<h3>
    <a href="{{ config('app.url') }}">{{ config('app.name') }}</a>
</h3>
<p>
    下記のURLにアクセスしてパスワードを再設定してください。<br>
    有効期限は60分です<br>
    もし、このメールに心当たりのない場合は削除してください。
</p>
<p>
    {{ $actionText }}: <a href="{{ $actionUrl }}">{{ $actionUrl }}</a>
</p>