<x-layout>
    <x-slot:heading>
        Create Product
    </x-slot:heading>
    <form method="post" action="/products">
        @csrf
        <div class="flex align-middle justify-center">
            <div class="m-10 max-w-fu">

                <div class="w-full space-y-3 text-gray-700">
                    <div class="">
                        <input type="text" placeholder="Product name" name="name" value="{{old('name')}}"
                               class="h-12 w-full max-w-full rounded-md border bg-white px-5 text-sm outline-none focus:ring"/>
                    </div>
                    <x-form-error name="name"></x-form-error>
                    <div class="">
                        <input type="text" placeholder="Product color" name="color"
                               class="h-12 w-full max-w-full rounded-md border bg-white px-5 text-sm outline-none focus:ring"/>
                    </div>
                    <x-form-error name="color"></x-form-error>

                    <div class="">
                <textarea name="description" id="description" placeholder="Write your description here" cols="30"
                          rows="6" value="{{old('description')}}"
                          class="h-40 w-full min-w-full max-w-full overflow-auto whitespace-pre-wrap rounded-md border bg-white p-5 text-sm font-normal normal-case text-gray-600 opacity-100 outline-none focus:text-gray-600 focus:opacity-100 focus:ring"></textarea>
                    </div>
                    <x-form-error name="description"></x-form-error>

                </div>
                <div class="m-10 max-w-sm">
                    <label for="price" class="mb-2 block text-sm font-medium">Product Price</label>
                    <div class="relative">
                        <input type="text" id="price" name="price" value="{{old('price')}}"
                               class="block w-full rounded-md border border-gray-200 py-3 px-4 pl-9 pr-16 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                               placeholder="0.00"/>
                        <div class="pointer-events-none absolute inset-y-0 left-0 z-20 flex items-center pl-4">
                            <span class="text-gray-500">$</span>
                        </div>
                        <div class="pointer-events-none absolute inset-y-0 right-0 z-20 flex items-center pr-4">
                            <span class="text-gray-500">USD</span>
                        </div>
                    </div>
                    <x-form-error name="price"></x-form-error>

                </div>

                <div class="m-10 max-w-sm">
                    <label for="website" class="block text-sm font-medium text-gray-700">Product Image URL</label>
                    <div class="flex rounded-md shadow-sm">
                        <div
                            class="inline-flex min-w-fit items-center rounded-l-md border border-r-0 border-gray-200 bg-gray-50 px-4">
                            <span class="text-sm text-gray-500">https://</span>
                        </div>
                        <input type="text" name="image" id="image" value="{{old('image')}}"
                               class="block w-full rounded-r-md border border-gray-200 py-3 px-4 pr-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                               placeholder="www.example.com"/>
                    </div>
                </div>
                <x-form-error name="image"></x-form-error>

                <div class="float-right">

                    <x-form-button>Save</x-form-button>
                </div>
            </div>
        </div>
    </form>
</x-layout>

