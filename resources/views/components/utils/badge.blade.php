@props(['label' => null, 'type' => 'primary'])

@php
    $bgColorClass = '';

    switch ($type) {
        case 'primary':
            $bgColorClass = 'bg-blue-600 text-white dark:bg-blue-900 dark:text-blue-100';
            break;
        case 'success':
            $bgColorClass = 'bg-green-300 text-green-900 dark:bg-green-900 dark:text-green-300';
            break;
        case 'warning':
            $bgColorClass = 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300';
            break;
        case 'danger':
            $bgColorClass = 'bg-red-100 text-red-800 dark:bg-yellow-900 dark:text-yellow-300';
            break;
        default:
            $bgColorClass = 'bg-blue-600 text-blue-800 dark:bg-blue-900 dark:text-blue-300';
            break;
    }
@endphp

<span {!! $attributes->merge([
    'class' => 'text-xs font-medium me-2 px-2.5 py-0.5 rounded ' . $bgColorClass,
]) !!}>{{ $label }}</span>
