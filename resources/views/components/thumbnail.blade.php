@php
  if($type === 'shops'){
    $path = 'storage/shops/';
  }
  if($type === 'products'){
    $path = 'storage/products/';
  }
@endphp

<div>
  @if(empty($filename))
  <img src="{{ asset('images/noimages.jpg')}}">
  @else
  <img src="{{ asset($path .$filename)}}">
  @endif
</div>