@props(['label', 'route', 'permission', 'icon', 'icon_class' => 'w-4 h-4 text-gray-500'])
@php
    $default_classes =
        'group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white';
    if (is_route_name_active($route)) {
        $default_classes .= ' font-medium text-white ';
    } else {
        $default_classes .= ' text-bodydark2 ';
    }
@endphp
@can($permission)
    <li>
        <a href="{{ route($route) }}" {{ $attributes->merge([
            'class' => $default_classes,
        ]) }}>
            @isset($icon)
                @svg('heroicon-' . $icon, $icon_class)
            @endisset
            {{ $label }}
        </a>
    </li>
@endcan
