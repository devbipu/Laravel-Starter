<x-app-layout>
    <div class="p-4 mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
        <x-breadcrumb />
        <!-- component -->
        <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                <h3 class="font-medium text-black dark:text-white">
                    Edit User {{ user_have_permission('dashboard', 'read') ? 'true' : 'fasle' }}
                </h3>
            </div>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-3 place-items-stretch gap-5.5 p-6.5">
                    <div>
                        <x-input-label>First name</x-input-label>

                        <x-text-input name="first_name" value="{{ $user->first_name }}"
                            placeholder="Enter First Name"></x-text-input>
                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label>Last name</x-input-label>

                        <x-text-input name="last_name" value="{{ $user->last_name }}"
                            placeholder="Enter Last Name"></x-text-input>
                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label>Employee Id</x-input-label>

                        <x-text-input name="employee_id" value="{{ $user->employee_id }}" type="number"
                            placeholder="Enter Employee ID"></x-text-input>
                        <x-input-error :messages="$errors->get('employee_id')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label>Email</x-input-label>

                        <x-text-input name="email" value="{{ $user->email }}" placeholder="Enter Email Address"
                            type="email"></x-text-input>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label>Phone</x-input-label>

                        <x-text-input name="phone_number" value="{{ $user->phone_number }}"
                            placeholder="Enter Phone Number" type="text"></x-text-input>
                        <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label>Password</x-input-label>

                        <x-text-input name="password" placeholder="Enter Password" type="text"></x-text-input>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label>Date Of Birth</x-input-label>

                        <x-text-input name="dob" value="{{ $user?->dob?->format('Y-m-d') }}"
                            placeholder="Selete Birthday" type="date"></x-text-input>
                        <x-input-error :messages="$errors->get('dob')" class="mt-2" />
                    </div>



                    <div>
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Select Role
                        </label>
                        <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-white dark:bg-form-input">
                            <select name="role_id"
                                class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 pl-5 pr-12 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input"
                                :class="isOptionSelected &&
                                    'text-black dark:text-white'"
                                @change="isOptionSelected = true">
                                <option value="">Select Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"
                                        @if ($role->id == $user?->role?->id) selected @endif class="text-body">
                                        {{ $role->name }} </option>
                                @endforeach
                            </select>
                            <span class="absolute right-4 top-1/2 z-20 -translate-y-1/2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.8">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                            fill="#637381"></path>
                                    </g>
                                </svg>
                            </span>
                        </div>

                        <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
                    </div>

                    <div class="self-end">
                        <x-primary-button class="p-4"> Update </x-primary-button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</x-app-layout>
