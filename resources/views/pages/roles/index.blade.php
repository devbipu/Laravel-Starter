<x-app-layout>
    <div class="p-4 mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
        <x-breadcrumb />
        <!-- component -->
        <div
            class="bg-clip-border rounded-[.95rem] border border-stroke bg-white w-full max-w-full mx-auto mb-6 dark:border-strokedark dark:bg-boxdark">
            <div class="relative break-words min-w-0 py-8 pt-6 px-9">
                <div class="page-action flex justify-end">
                    <div class="mb-2">
                        <x-utils.button permissions="role.create" :href="route('role.create')" class="rounded-full">
                            Add New
                            @svg('heroicon-o-plus', 'w-6 h-6')
                        </x-utils.button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full my-0 align-middle text-dark border-neutral-200">
                        <thead class="align-bottom">
                            <tr class="font-semibold text-[0.95rem] text-secondary-dark">
                                <th class="pb-3 text-start">{{ __('Sl. No') }}</th>
                                <th class="pb-3 text-center min-w-[100px]">{{ __('Name') }}</th>
                                <th class="pb-3 text-center w-[200px]">{{ __('Permissions') }}</th>
                                <th class="pb-3 text-center min-w-[100px]">{{ __('Status') }}</th>
                                <th class="pb-3 text-center min-w-[100px]">{{ __('Created At') }}</th>
                                <th class="pb-3 text-center min-w-[50px]">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                                <tr class="border-b border-dashed last:border-b-0">
                                    <td class="p-3 pl-0">{{ $loop->iteration }}</td>
                                    <td class="p-3 pr-0 text-center">
                                        <span
                                            class="font-normal text-light-inverse text-md/normal">{{ $role->name }}</span>
                                    </td>
                                    <td class="pr-0 text-center">
                                        <span
                                            class="font-normal text-light-inverse text-md/normal"><code>{!! $role->super_admin ? '**' : json_encode($role->permissions) !!}</code></span>
                                    </td>
                                    <td class="pr-0 text-center">
                                        <span
                                            class="font-normal text-light-inverse text-md/normal">{{ $role->status ? 'Active' : 'In-active' }}</span>
                                    </td>
                                    <td class="pr-0 text-center">
                                        <span
                                            class="font-normal text-light-inverse text-md/normal">{{ $role->created_at?->format('d M Y') }}</span>
                                    </td>
                                    <td class="p-3 pr-0 text-center">
                                        @if (!$role->super_admin)
                                            <x-utils.button permissions="role.update" :href="route('role.edit', $role->id)" disabled="true"
                                                class="me-2 mb-2 w-fit">
                                                @svg('heroicon-o-pencil-square', 'w-4')
                                                Edit </x-utils.button>
                                            <form action="{{ route('role.destroy', $role->id) }}" method="POST"
                                                class="mt-2">
                                                @csrf
                                                @method('DELETE')
                                                <x-form.input-button permissions="role.delete" class="me-2 mb-2 "
                                                    type="submit" theme_type="danger">
                                                    @svg('heroicon-o-trash', 'w-4')
                                                    Delete </x-form.input-button>

                                            </form>
                                        @endif

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">No Role Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
