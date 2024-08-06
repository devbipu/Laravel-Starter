<x-app-layout>
    <div class="p-4 mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
        <x-breadcrumb />
        <!-- component -->
        <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                <h3 class="font-medium text-black dark:text-white">
                    Create User {{ user_have_permission('dashboard', 'read') ? 'true' : 'fasle' }}
                </h3>
            </div>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 place-items-stretch gap-5.5 p-6.5">
                    <div>
                        <x-form.input-box name="first_name" label="First name" :messages="$errors->get('first_name')"
                            placeholder="Enter First Name" />
                    </div>
                    <div>
                        <x-form.input-box name="last_name" label="Last name" :messages="$errors->get('last_name')"
                            placeholder="Enter Last Name" />
                    </div>
                    <div>
                        <x-form.input-box name="employee_id" type="number" label="Employee ID" :messages="$errors->get('employee_id')"
                            placeholder="Enter Employee ID" />
                    </div>
                    <div>
                        <x-form.input-box name="email" type="email" label="Email" :messages="$errors->get('email')"
                            placeholder="Enter Email Address" />
                    </div>

                    <div>
                        <x-form.input-box name="phone_number" type="phone_number" label="Phone" :messages="$errors->get('phone_number')"
                            placeholder="Enter Phone Number" />
                    </div>
                    <div>
                        <x-form.input-box name="password" type="password" label="Password" :messages="$errors->get('password')"
                            placeholder="Enter Password" />
                    </div>
                    <div>
                        <x-form.input-box name="dob" type="date" label="Birthday Date" :messages="$errors->get('dob')"
                            placeholder="Selete Birthday" />
                    </div>

                    <div>
                        <x-form.input-dropdown name="role_id" :options="$roles" selected="3" option_val='id'
                            label="Select Role" :messages="$errors->get('role_id')" />
                    </div>

                    <div class="self-end">
                        <x-primary-button class="p-4">Submit </x-primary-button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</x-app-layout>
