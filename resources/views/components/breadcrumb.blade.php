<div>
    <div class="flex flex-col gap-3 mb-6 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="font-bold text-black text-title-md2 dark:text-white">
            {{ $title ? $title : ucfirst(str_replace('-', ' ', last(explode('/', url()->current())))) }}
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium" href="{{ route('dashboard') }}">Dashboard /</a>
                </li>
                <li class="font-medium text-primary">
                    {{ ucfirst(str_replace('-', ' ', last(explode('/', url()->current())))) }}
                </li>
            </ol>
        </nav>
    </div>
</div>
