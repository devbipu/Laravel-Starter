<x-app-layout>
    <div class="p-4 mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
        <x-breadcrumb />
        <!-- component -->
        <div
            class="bg-clip-border rounded-[.95rem] border border-stroke bg-white w-full max-w-full mx-auto mb-6 dark:border-strokedark dark:bg-boxdark">
            <div class="relative break-words min-w-0 py-8 pt-6 px-9">
                <div class="page-action flex justify-end">
                    <div class="mb-2">
                        <x-utils.button permissions="users.create" :href="route('users.create')" class="rounded-full">
                            Add New
                            @svg('heroicon-o-plus', 'w-6 h-6')
                        </x-utils.button>
                    </div>
                </div>
                <div class="block">
                    <div class="overflow-x-auto">
                        <table class="w-full my-0 align-middle text-dark border-neutral-200">
                            <thead class="align-bottom">
                                <tr class="font-semibold text-[0.95rem] text-secondary-dark">
                                    <th class="pb-3 text-start">{{ __('Sl. No') }}</th>
                                    <th class="pb-3 text-center min-w-[100px]">{{ __('User') }}</th>
                                    <th class="pb-3 text-center min-w-[100px]">{{ __('Email') }}</th>
                                    <th class="pb-3 text-center min-w-[100px]">{{ __('Role') }}</th>
                                    <th class="pb-3 text-center min-w-[100px]">{{ __('Employee Id') }}</th>
                                    <th class="pb-3 text-center min-w-[100px]">{{ __('Phone') }}</th>
                                    <th class="pb-3 text-center min-w-[100px]">{{ __('Gender') }}</th>
                                    <th class="pb-3 text-center min-w-[100px]">{{ __('DOB') }}</th>
                                    <th class="pb-3 text-center min-w-[100px]">{{ __('Status') }}</th>
                                    <th class="pb-3 text-center min-w-[50px]">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr class="border-b border-dashed last:border-b-0">
                                        <td class="p-3 pl-0">{{ $loop->iteration }}</td>
                                        <td class="p-3 pl-0">
                                            <div class="flex items-center">
                                                <div class="relative inline-block shrink-0 rounded-2xl me-3">
                                                    @if ($user->avater_id)
                                                        <img src="https://raw.githubusercontent.com/Loopple/loopple-public-assets/main/riva-dashboard-tailwind/img/img-49-new.jpg"
                                                            class="w-[50px] h-[50px] inline-block shrink-0 rounded-2xl"
                                                            alt="">
                                                    @else
                                                        <x-heroicon-o-user-circle class="w-8 h-8 text-gray-500" />
                                                    @endif
                                                </div>
                                                <div class="flex flex-col justify-start">
                                                    <span
                                                        class="mb-1 font-semibold transition-colors duration-200 ease-in-out text-lg/normal text-secondary-inverse hover:text-primary">
                                                        {{ $user->first_name }} {{ $user->last_name }}
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3 pr-0 text-center">
                                            <span
                                                class="font-normal text-light-inverse text-md/normal">{{ $user->email }}</span>
                                        </td>
                                        <td class="p-3 pr-0 text-center">
                                            <span
                                                class="font-normal text-light-inverse text-md/normal">{{ $user?->role?->name }}</span>
                                        </td>
                                        <td class="p-3 pr-0 text-center">
                                            <span
                                                class="inline-flex items-center px-2 py-1 mr-auto ">{{ $user->employee_id }}</span>
                                        </td>
                                        <td class="pr-0 text-center">
                                            <span
                                                class="font-normal text-light-inverse text-md/normal">{{ $user->phone_number }}</span>
                                        </td>
                                        <td class="pr-0 text-center">
                                            <span
                                                class="font-normal text-light-inverse text-md/normal">{{ $user->gender }}</span>
                                        </td>
                                        <td class="pr-0 text-center">
                                            <span
                                                class="font-normal text-light-inverse text-md/normal">{{ $user->dob?->format('d M y') }}</span>
                                        </td>
                                        <td class="pr-0 text-center">
                                            @if ($user->status)
                                                <x-utils.badge label="Active" type="success" />
                                            @else
                                                <x-utils.badge label="InActive" type="danger" />
                                            @endif
                                        </td>
                                        <td class="p-3 pr-0 text-center">
                                            <x-utils.button permissions="users.update" :href="route('users.edit', $user->id)"
                                                class="me-2 mb-2 ">
                                                @svg('heroicon-o-pencil-square', 'w-4')
                                                Edit </x-utils.button>

                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                class="mt-2">
                                                @csrf
                                                @method('DELETE')
                                                <x-form.input-button permissions="users.delete" class="me-2 mb-2 "
                                                    type="submit" theme_type="danger">
                                                    @svg('heroicon-o-trash', 'w-4')
                                                    Delete </x-form.input-button>

                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">No User Found</td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                        <div class="py-3 text-center">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
