@props(['name', 'value'])
<div x-data="{
    switcherToggle: @json($value ? true : false)
}">
    <input type="hidden" name="{{ $name }}" value="{{ $value ? 1 : 0 }}">
    <label for="{{ $name }}" class="flex cursor-pointer select-none items-center justify-center">
        <div class="relative">
            <input type="checkbox" id="{{ $name }}" :value="switcherToggle ? 1 : 0" {!! $attributes->merge(['class' => 'sr-only', 'name' => $name]) !!}
                @change="switcherToggle = !switcherToggle">
            <div class="block h-8 w-14 rounded-full bg-meta-9 dark:bg-[#5A616B]"></div>
            <div :class="switcherToggle && '!right-1 !translate-x-full !bg-primary dark:!bg-white'"
                class="absolute left-1 top-1 h-6 w-6 rounded-full bg-white transition"></div>
        </div>
    </label>
</div>
