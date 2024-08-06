<x-app-layout>
    <div class="p-4 mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
        <x-breadcrumb />
        <!-- component -->
        <div
            class="rounded-[.95rem] bg-white border rounded-sm border-stroke shadow-default dark:border-strokedark dark:bg-boxdark mb-5 px-9 bg-clip-border">
            <div class="relative flex flex-col py-8 pt-6 break-words max-w-96 ">
                <form action="{{ route('role.store') }}" method="POST">
                    @csrf
                    <div class="py-4 border-stroke dark:border-strokedark">
                        <h3 class="font-medium text-black dark:text-white">
                            Create Role
                        </h3>
                    </div>
                    <div class="flex flex-col gap-5.5">
                        <div>
                            <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                                Name
                            </label>
                            <input type="text" placeholder="Role Name" name="name"
                                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
                        </div>

                        <div x-data="{ switcherToggle: false }">
                            <label for="rolestatus" class="flex items-center gap-2 cursor-pointer select-none">
                                <div class="relative">
                                    <input type="checkbox" id="rolestatus" name="status" class="sr-only"
                                        @change="switcherToggle = !switcherToggle" />
                                    <div class="block h-8 w-14 rounded-full bg-meta-9 dark:bg-[#5A616B]"></div>
                                    <div :class="switcherToggle && '!right-1 !translate-x-full !bg-primary dark:!bg-white'"
                                        class="absolute w-6 h-6 transition bg-white rounded-full left-1 top-1">
                                    </div>
                                </div>
                                <span>Status</span>
                            </label>
                        </div>
                        <div>
                            <x-primary-button class="px-2 py-2">Save</x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
