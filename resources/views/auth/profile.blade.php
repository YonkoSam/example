@php
    $user=Auth::user()
@endphp

<x-layout>
    <x-slot:heading>
        Edit Profile {{ $user->title}}
    </x-slot:heading>
    <form method="POST" action="/profile" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">

                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                                 role="alert">
                                <strong class="font-bold">Success!</strong>
                                <span class="block sm:inline">{{ session('success') }}</span>
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 5.652a.5.5 0 0 1 .708.708L11.707 10l3.35 3.35a.5.5 0 1 1-.708.708L11 10.707l-3.35 3.35a.5.5 0 0 1-.708-.708L10.293 10 6.943 6.65a.5.5 0 0 1 .708-.708L11 9.293l3.35-3.35z"/>
                    </svg>
                </span>
                            </div>
                        @endif
                        <x-form-label for="name">Full name</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="name" id="name" value="{{ $user->name }}" required/>
                            <x-form-error name="name"/>

                        </div>
                        <div class="col-span-full">
                            <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                            <div class="mt-2 flex items-center gap-x-3">
                                @if($user->employer->profile_picture != null)
                                    <img
                                        src="{{asset('images/' .$user->employer->profile_picture) }}"
                                        alt="" class="h-10 w-10 rounded-full bg-gray-50">
                                @else
                                    <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                         aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                @endif
                                <input type="file" id="photo" name="photo" accept="image/*" class="hidden">
                                <label for="photo" id="photo-label"
                                       class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 cursor-pointer">Change</label>
                            </div>

                            <div id="photo-preview" class="mt-2"></div>
                        </div>
                        <div class="mt-3 sm:col-span-4">
                            <x-form-label for="company_name">Company name</x-form-label>
                            <div class="mt-2">
                                <x-form-input name="company_name" id="company_name" value="{{ $user->employer->name}}"
                                              required/>
                                <x-form-error name="company_name"/>

                            </div>
                        </div>
                        <div class="mt-3 sm:col-span-4">
                            <x-form-label for="email">Email</x-form-label>
                            <x-form-input type="email" name="email" id="email" value="{{$user->email}}" required/>
                            <x-form-error name="email"/>

                        </div>
                        <div class="mt-3 sm:col-span-4">
                            <x-form-label for="old_password">Current Password</x-form-label>
                            <x-form-input type="password" name="old_password" id="old_password" required/>
                            <x-form-error name="old_password"/>

                        </div>
                        <div id="passwordFields" style="display: none;">
                            <div class="sm:col-span-4">
                                <x-form-label for="password">New Password</x-form-label>
                                <x-form-input type="password" name="password" id="password"/>
                                <x-form-error name="password"/>
                            </div>
                            <div class="sm:col-span-4">
                                <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                                <x-form-input type="password" name="password_confirmation" id="password_confirmation"/>
                                <x-form-error name="password_confirmation"/>
                            </div>
                        </div>
                        <button type="button"
                                class="mt-6 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                id="showPasswordFieldsBtn">Change Your Password
                        </button>
                        <script>
                            document.getElementById('showPasswordFieldsBtn').addEventListener('click', function () {
                                var passwordFields = document.getElementById('passwordFields');
                                if (passwordFields.style.display === 'none') {
                                    passwordFields.style.display = 'block';
                                } else {
                                    passwordFields.style.display = 'none';
                                }
                            });
                        </script>

                    </div>
                </div>
            </div>

            <div class="space-y-1">
                <div class="border-b border-gray-900/10 pb-6">
                    <div class="grid grid-cols-1 gap-x-3 gap-y-4 sm:grid-cols-3">
                        @if (Auth::user()->permissions == -1)
                            <label>{{ $user->name }} is an Admin </label>
                        @else
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
                        @endif
                    </div>
                </div>
            </div>


            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <x-form-button>Update</x-form-button>
            </div>
    </form>
</x-layout>
