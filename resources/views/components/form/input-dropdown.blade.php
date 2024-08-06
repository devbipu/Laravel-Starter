@props([
    'name',
    'options' => [],
    'label' => '',
    'selected' => null,
    'value_field' => null,
    'label_field' => null,
    'messages' => null,
])
<label class="mb-3 block text-sm font-medium text-black dark:text-white">
    {{ $label }}
</label>
<div x-data="{ isOptionSelected: false }" class="relative z-20 bg-white dark:bg-form-input">
    <select name="{{ $name }}"
        class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 pl-5 pr-12 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input"
        :class="isOptionSelected &&
            'text-black dark:text-white'" @change="isOptionSelected = true">
        @foreach ($options as $option)
            <option value="{{ $value_field ? $option->$value_field : $option->id }}"
                @if ($selected && $selected === ($value_field ? $option->$value_field : $option->id)) selected @endif class="text-body">
                {{ $label_field ? $option->$label_field : $option->name }}
            </option>
        @endforeach
    </select>
    <span class="absolute right-4 top-1/2 z-20 -translate-y-1/2">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g opacity="0.8">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                    fill="#637381"></path>
            </g>
        </svg>
    </span>
</div>

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
