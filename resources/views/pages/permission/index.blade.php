<x-app-layout>
    <div class="p-4 mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
        <x-breadcrumb />
        <div
            class="rounded-[.95rem] bg-white border rounded-sm p-6 border-stroke shadow-default dark:border-strokedark dark:bg-boxdark mb-5 bg-clip-border">
            <div class="page-action flex justify-end">
                <div class="mb-2">
                    <x-utils.button permissions="users.delete" :href="route('permissions.create')" class="rounded-full">
                        Add New
                        @svg('heroicon-o-plus', 'w-6 h-6')
                    </x-utils.button>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4 ">
                <div class="col-start-2 ">
                    <div x-data="{ isOptionSelected: false }">
                        <form action="{{ route('permissions.index') }}" method="get"
                            x-on:change="isOptionSelected = true">
                            <label for="roleSelect">Select Role</label>
                            <select id="roleSelect" name="role_id"
                                class="relative z-20 w-full py-3 pl-4 text-black transition bg-transparent border rounded outline-none appearance-none pr-312 border-stroke focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white text-black dark:text-white"
                                x-bind:class="{ 'border-primary': isOptionSelected }"
                                x-on:change="isOptionSelected = true; $event.target.form.submit()">
                                <option value="" selected>Select Role</option>
                                @forelse ($roles as $role)
                                    <option value="{{ $role->id }}"
                                        @if (!is_null(request()->get('role_id')) && request()->get('role_id') == $role->id) selected @endif class="text-body">
                                        {{ $role->name }}</option>
                                @empty
                                    <option value="" class="text-body">No Role Found</option>
                                @endforelse
                            </select>
                        </form>
                    </div>
                </div>
            </div>


            <div class="mt-6">
                <form action="{{ route('permissions.set') }}" method="POST">
                    @csrf
                    <input type="hidden" name="roleid" value="{{ request()->get('role_id') }}">

                    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-3 py-6">
                        @foreach ($permissions as $data)
                            <div
                                class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                                <div
                                    class="flex justify-between items-center bg-slate-50 border-b border-stroke p-2 px-4  dark:border-strokedark">
                                    <h4 class="text-md font-semibold text-black dark:text-white">
                                        {{ $data->name }}
                                        <x-utils.badge :label="$data?->slug" type="warning" />
                                    </h4>
                                    <a href="{{ route('permissions.edit', $data->id) }}" class="hover:text-blue-600">
                                        @svg('heroicon-o-pencil', 'w-4 h-4') </a>
                                </div>
                                <div class="">
                                    <ul
                                        class="text-sm font-medium text-gray-900 bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                        @foreach ($data->values as $key => $action)
                                            <li
                                                class="w-full px-4 capitalize py-2 border-b border-[#eee] rounded-t-lg dark:border-gray-600 last:border-0">
                                                <x-form.checkbox name="{{ $data?->slug }}[{{ $key }}]"
                                                    :value="!is_null($role_permissions) &&
                                                    isset($role_permissions[$data->slug][$key]) &&
                                                    request()->get('role_id')
                                                        ? $role_permissions[$data->slug][$key]
                                                        : 0" :label="str_replace('_', ' ', ucfirst($key))" />
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex justify-end mt-4">
                        <div class="">
                            <x-primary-button class="p-2 px-5">Save
                                Changes</x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
