@php
    $link = route($route)
@endphp

<a {{ $attributes->class([
    "hover:text-white",
    $link == url()->current() ? 'text-white' : 'text-gray-400'
])->merge([
    'href' => $link
]) }} >
    {{ $slot  }}
</a>
