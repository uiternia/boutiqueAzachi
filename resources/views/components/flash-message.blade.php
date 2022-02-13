@props(['status' => 'success'])

@php
  if(session('status') === 'success'){$bgColor = 'bg-green-600';}
  if(session('status') === 'alert'){$bgColor = 'bg-red-600';}
@endphp

@if(session('message'))
<div class="{{ $bgColor }} w-1/2 mx-auto p-2 text-white">
  {{ session('message') }}
</div>
@endif

