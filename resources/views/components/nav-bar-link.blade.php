@props(['active' => false])

<a class="{{ $active ? 'bg-witte_eend text-black':'text-black hover:bg-white/5 hover:text-gray-500'}} rounded-md px-3 py-2 text-sm font-medium"
   aria-current="{{ $active ? 'page' : 'false' }}"
   {{$attributes}}
>{{$slot}}</a>

