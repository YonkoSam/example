<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>
    <form method="POST" action="/register" enctype="multipart/form-data">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">

                        <x-form-label for="name">Full name</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="name" id="name" :value="old('name')" required/>
                            <x-form-error name="name"/>

                        </div>

                        <div class="col-span-full">
                            <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                            <div class="mt-2 flex items-center gap-x-3">
                                <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                          clip-rule="evenodd"/>
                                </svg>
                                <input type="file" id="photo" name="photo" accept="image/*" class="hidden">
                                <label for="photo" id="photo-label"
                                       class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 cursor-pointer">Change</label>
                            </div>
                            <div id="photo-preview" class="mt-2"></div>
                        </div>

                        <div class="sm:col-span-4">
                            <x-form-label for="company_name">Company name</x-form-label>
                            <div class="mt-2">
                                <x-form-input name="company_name" id="company_name" :value="old('company_name')"
                                              required/>
                                <x-form-error name="company_name"/>

                            </div>
                        </div>
                        <div class="sm:col-span-4">
                            <x-form-label for="email">Email</x-form-label>
                            <x-form-input type="email" name="email" id="email" :value="old('email')" required/>
                            <x-form-error name="email"/>

                        </div>
                        <div class="sm:col-span-4">
                            <x-form-label for="password">Password</x-form-label>
                            <x-form-input type="password" name="password" id="password" required/>
                            <x-form-error name="password"/>

                        </div>

                        <div class="sm:col-span-4">
                            <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                            <x-form-input type="password" name="password_confirmation" id="password_confirmation"
                                          required/>
                            <x-form-error name="password_confirmation"/>
                        </div>

                    </div>
                </div>
            </div>

            <div class="space-y-1">
                <div class="border-b border-gray-900/10 pb-6">
                    <div class="grid grid-cols-1 gap-x-3 gap-y-4 sm:grid-cols-3">
                        <x-form-label>Permissions :</x-form-label>
                        @foreach ($permissions as $permission)
                            <div class="sm:col-span-4">
                                <x-checkbox name="permissions[]" id="{{ $permission->name}}_permission"
                                            value="{{$permission->value}}"></x-checkbox>
                                <label for="{{$permission->name}}_permission"
                                       class="mt-2 text-sm font-medium text-black-900 dark:text-black-300">{{ ucfirst($permission->name)}}
                                    Permission</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <x-form-button>Register</x-form-button>
            </div>
    </form>
</x-layout>
