@props(['label' => null, 'theme_type' => 'primary', 'permissions'])

@php
    $bgColorClass = '';

    switch ($theme_type) {
        case 'primary':
            $bgColorClass =
                'text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800';
            break;
        case 'secondary':
            $bgColorClass =
                'text-gray-900 focus:outline-none bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700';
            break;
        case 'success':
            $bgColorClass =
                'text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800';
            break;
        case 'warning':
            $bgColorClass =
                'text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-900';
            break;
        case 'danger':
            $bgColorClass =
                'text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900';
            break;
        default:
            $bgColorClass =
                'bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800';
            break;
    }
@endphp

@if (isset($permissions) && !authorize_user($permissions))
    <button type="button"
        {{ $attributes->merge(['title' => 'You don\'t have permission', 'disabled' => true, 'class' => 'flex justify-center items-center gap-1 w-fit font-medium rounded text-sm px-5 py-2 disabled:opacity-75 disabled:cursor-not-allowed ' . $bgColorClass]) }}>{{ $label ?? $slot }}</button>
@else
    <button
        {{ $attributes->merge(['class' => 'flex justify-center items-center gap-1 font-medium rounded text-sm px-5 py-2 ' . $bgColorClass]) }}>{{ $label ?? $slot }}</button>
@endif
