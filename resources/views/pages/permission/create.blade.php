<x-app-layout>
    <div class="p-4 mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
        <x-breadcrumb />
        <!-- component -->
        <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                <h3 class="font-medium text-black dark:text-white">
                    Create Permission
                </h3>
            </div>
            <form action="{{ route('permissions.store') }}" method="POST" class="p-6.5">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 place-items-stretch gap-5.5 ">
                    <div>
                        <x-form.input-box name="name" label="Module Name" :messages="$errors->get('name')"
                            placeholder="Enter Module Name" />
                        <span class="text-sm">No duplicate entry</span>
                    </div>
                    <div>
                        {{-- <x-form.input-box name="module_slug" readonly="true" label="Module Slug" :messages="$errors->get('module_slug')"
                            placeholder="Enter Module Slug" /> --}}
                    </div>
                    <div class="col-span-2">
                        <textarea name="actions" label="Module Actions"
                            class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            spellcheck="false" placeholder="read, create, update, delete">read, create, update, delete</textarea>
                        <span class="text-sm">Comma (,) Seperated Multiple Value</span>
                    </div>
                </div>
                <div class="mt-4 flex gap-2">
                    <x-primary-button class="px-6 !w-fit ">Submit</x-primary-button>
                </div>
            </form>
        </div>

    </div>
</x-app-layout>
