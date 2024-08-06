@props(['label', 'route', 'permission', 'icon', 'icon_class' => 'w-4 h-4 text-gray-500'])
@php
    $default_classes =
        'group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4 ';
    if (is_route_name_active($route)) {
        $default_classes .= 'bg-graydark hover:bg-meta-4 ';
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
